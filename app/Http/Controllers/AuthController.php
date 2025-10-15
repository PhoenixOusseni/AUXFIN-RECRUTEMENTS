<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle the user login request.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Valider les données reçues
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Tenter l'authentification
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate(); // protège contre les attaques de session fixation

            return redirect()->intended(route('home'))->with('success', 'Connexion réussie');
        }

        // Échec : on retourne avec un message sans révéler la cause exacte
        return back()->withErrors([
            'email' => 'Les identifiants sont invalides.',
        ])->onlyInput('email');
    }

    /**
     * Handle the user login request.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login_admin(Request $request)
    {
        // Valider les données reçues
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Tenter l'authentification
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate(); // Protection contre fixation de session

            // Vérifier le rôle de l'utilisateur connecté
            if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3) { // 2 pour admin, 3 pour super-admin
                return redirect()->route('dashboard')->with('success', 'Connexion réussie');
            }

            // Déconnexion si le rôle ne correspond pas
            Auth::logout();
            return back()->withErrors([
                'email' => 'Vous n\'êtes pas autorisé à accéder à cette section.',
            ])->onlyInput('email');
        }

        // Échec : identifiants invalides
        return back()->withErrors([
            'email' => 'Les identifiants sont invalides.',
        ])->onlyInput('email');
    }


    /**
     * Handle the user logout request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); // Protection CSRF

        return redirect()->route('home')->with('success', 'Déconnexion réussie.');
    }

    public function register(Request $request)
    {
        // Valider les données reçues
        $data = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Créer l'utilisateur
        $user = User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if (!$user) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de l\'inscription.'])->withInput();
        } else {
            // Attribuer un rôle par défaut (optionnel)
            $user->role_id = 1; // Par exemple, 1 pour "candidat"
            $user->save();
            // Authentifier l'utilisateur
            Auth::login($user);

            return redirect()->route('home')->with('success', 'Inscription réussie.');
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        $user->telephone = $request->input('telephone');
        $user->adresse = $request->input('adresse');
        $user->domicile = $request->input('domicile');
        $user->date_naiss = $request->input('date_naiss');
        $user->lieu_naiss = $request->input('lieu_naiss');
        $user->nationalite = $request->input('nationalite');
        $user->sexe = $request->input('sexe');
        $user->situation_matrimoniale = $request->input('situation_matrimoniale');
        // Gérer la mise à jour de la photo de profil si fournie

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images', 'public');
            $user->photo = $path;
        }

        $user->save();

        return redirect()->route('profile.user', $user->id)->with('success', 'Profil mis à jour avec succès.');
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);

        // Vérifier le mot de passe actuel
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Mettre à jour le mot de passe
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('profile.user', $user->id)->with('success', 'Mot de passe mis à jour avec succès.');
    }

    // Password Reset Methods
    public function showLinkRequestForm()
    {
        return view('clients.auth.passwords_email');
    }

    // Envoyer le lien de réinitialisation
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Envoyer le lien de réinitialisation
        $status = \Password::sendResetLink(
            $request->only('email')
        );

        return $status === \Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // Afficher le formulaire de réinitialisation
    public function showResetForm($token)
    {
        return view('clients.auth.passwords_reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = \Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(\Str::random(60));
            }
        );

        return $status === \Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
