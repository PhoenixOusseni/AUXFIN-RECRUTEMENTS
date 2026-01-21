# Guide de correspondance des routes obfusquées

## Routes publiques

| Ancienne URL | Nouvelle URL | Route Name |
|--------------|--------------|------------|
| `/login` | `/acc-user` | login |
| `/authentification-admin` | `/sys-admin-portal` | auth_admin |
| `/inscription` | `/new-account` | inscription |
| `/connexion` (POST) | `/auth-validate` (POST) | auth |
| `/login_admin` (POST) | `/sys-admin-auth` (POST) | login_admin |
| `/deconnexion` (POST) | `/session-end` (POST) | logout |
| `/offres_emploie` | `/opportunities` | offres |
| `/details_offres/{id}` | `/view-opportunity/{id}` | offres_finds |
| `/recherche_offres` (POST) | `/search-listings` (POST) | recherche |
| `/comment_inscrire` | `/registration-guide` | comment_inscrire |
| `/forgot-password` | `/account-recovery` | password.request |
| `/forgot-password` (POST) | `/send-recovery-link` (POST) | password.email |
| `/reset-password/{token}` | `/pwd-reset/{token}` | password.reset |
| `/reset-password` (POST) | `/update-credentials` (POST) | password.update |

## Routes protégées (nécessitent authentification)

| Ancienne URL | Nouvelle URL | Route Name |
|--------------|--------------|------------|
| `/dashboard` | `/panel` | dashboard |
| `/profile/{id}` | `/user-account/{id}` | profile.user |
| `/profile_update/{id}` (POST) | `/update-info/{id}` (POST) | profile_update |
| `/change_password/{id}` (POST) | `/secure-pwd/{id}` (POST) | change_password |
| `/mes_candidatures/{id}` | `/my-submissions/{id}` | mes_candidatures.user |
| `/detail_mes_candidatures/{id}/candidature` | `/submission-view/{id}/detail` | mes_candidatures_find.user |
| `/demande_stages` | `/internship-request` | form_stage.stage |
| `/gestion_offres` | `/manage-posts` | Resource routes |
| `/offres_en_cours` | `/active-listings` | offres_en_cours |
| `/offres_a_venir` | `/upcoming-listings` | offres_a_venir |
| `/offres_expirees` | `/archived-listings` | offres_expirees |
| `/gestion_offres/{id}/toggle-status` (POST) | `/manage-posts/{id}/status-toggle` (POST) | gestion_offres.toggle_status |
| `/postuler_offre/{id}` | `/apply-form/{id}` | form_postuler |
| `/postuler/{id}` (POST) | `/submit-application/{id}` (POST) | offres.postuler |
| `/detail_candidature/{id}` | `/application-detail/{id}` | details.candidatures |
| `/listes_candidature` | `/applications-list` | candidature.index |
| `/candidature/{id}/toggle-status` (POST) | `/application/{id}/status-update` (POST) | candidature.toggle_status |
| `/candidature/{id}` (DELETE) | `/application/{id}` (DELETE) | candidature.destroy |
| `/candidature_en_cours` | `/applications-processing` | candidature.en_cours |
| `/candidature_en_attente` | `/applications-pending` | candidature.en_attente |
| `/candidature_refusees` | `/applications-rejected` | candidature.refusees |
| `/candidature_acceptees` | `/applications-approved` | candidature.acceptees |
| `/demande_stages` (POST) | `/internship-submit` (POST) | demande_stages.store |
| `/listes_demandes_stage` | `/internship-requests-list` | demande_stages.index |
| `/demande_stages/{id}` | `/internship-detail/{id}` | demande_stages.show |
| `/demande_stages/{id}` (DELETE) | `/internship-remove/{id}` (DELETE) | demande_stages.destroy |
| `/demande_stages/{id}/toggle-status` (POST) | `/internship-status/{id}/toggle` (POST) | demande_stages.toggle_status |
| `/settings` | `/sys-config` | settings |
| `/settings_offres` | `/posts-config` | settings_offres |
| `/download-cvs` | `/export-documents` | download-cvs |
| `/settings_entretiens` | `/interview-management` | Resource routes |
| `/settings_entretiens/{id}/candidature` (POST) | `/interview-management/{id}/assign` (POST) | settings_entretiens.candidature |
| `/settings_entretiens/{id}/appercu` | `/interview-preview/{id}/view` | settings_entretiens.appercu |

## Important

**Les noms des routes (name) restent inchangés**, donc dans vos vues Blade, vous devez continuer à utiliser :
- `route('login')` au lieu de l'URL directe
- `route('dashboard')` au lieu de l'URL directe
- etc.

Cela garantit que même si les URLs changent, vos liens fonctionneront toujours.

## Avantages de cette obfuscation

1. **Sécurité accrue** : Les URLs ne révèlent plus la structure de votre application
2. **Moins prévisible** : Les attaquants ne peuvent pas deviner facilement les endpoints
3. **Professionnel** : URLs en anglais, plus standards
4. **Maintenance facile** : Grâce aux noms de routes, vous n'avez pas besoin de changer tous vos liens
