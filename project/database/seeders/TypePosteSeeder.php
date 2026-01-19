<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_postes')->insert([
            [
                'libelle' => 'Informatique & Technologie',
                'description' => 'Développeur Web, Administrateur Systèmes, Data Analyst',
            ],
            [
                'libelle' => 'Marketing & Communication',
                'description' => 'Responsable Marketing, Chargé de Communication, Community Manager',
            ],
            [
                'libelle' => 'Finance & Comptabilité',
                'description' => 'Comptable, Analyste Financier, Auditeur Interne',
            ],
            [
                'libelle' => 'Ressources Humaines',
                'description' => 'Responsable RH, Chargé de Recrutement, Gestionnaire de Paie',
            ],
            [
                'libelle' => 'Vente & Commerce',
                'description' => 'Commercial, Responsable des Ventes, Chef de Produit',
            ],
            [
                'libelle' => 'Santé & Médical',
                'description' => 'Infirmier, Médecin, Pharmacien',
            ],
            [
                'libelle' => 'Éducation & Formation',
                'description' => 'Enseignant, Formateur, Conseiller Pédagogique',
            ],
            [
                'libelle' => 'Ingénierie & Technique',
                'description' => 'Ingénieur Civil, Technicien de Maintenance, Architecte',
            ],
            [
                'libelle' => 'Hôtellerie & Tourisme',
                'description' => 'Réceptionniste, Guide Touristique, Chef de Cuisine',
            ],
            [
                'libelle' => 'Arts & Créativité',
                'description' => 'Designer Graphique, Photographe, Rédacteur',
            ],
            [
                'libelle' => 'Logistique & Transport',
                'description' => 'Responsable Logistique, Chauffeur, Gestionnaire de Stock',
            ],
            [
                'libelle' => 'Services Juridiques',
                'description' => 'Avocat, Juriste d\'Entreprise, Notaire',
            ],
            [
                'libelle' => 'Environnement & Développement Durable',
                'description' => 'Consultant en Environnement, Ingénieur en Énergies Renouvelables',
            ],
            [
                'libelle' => 'Recherche & Développement',
                'description' => 'Chercheur, Scientifique, Analyste de Données',
            ],
            [
                'libelle' => 'Autres',
                'description' => 'Catégorie Diverses',
            ],
        ]);
    }
}
