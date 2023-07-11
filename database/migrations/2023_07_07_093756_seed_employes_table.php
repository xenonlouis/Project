<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('employes')->insert([
            ['Numéro' => '200', 'Nom' => 'AOUZAL', 'Prénom' => 'Ghizlan', 'Status' => 'Assistante RH', 'Ligne_Direct' => '0524-33-88-00'],
            ['Numéro' => '201', 'Nom' => 'OUALKADI', 'Prénom' => 'Amine', 'Status' => 'Assistant DSI', 'Ligne_Direct' => '0524-33-88-01'],
            ['Numéro' => '202', 'Nom' => 'IDRISSI', 'Prénom' => 'Rajat', 'Status' => 'Directrice Ressources Humaines', 'Ligne_Direct' => '0524-33-88-02'],
            ['Numéro' => '203', 'Nom' => 'LAFRAM', 'Prénom' => 'Soufian', 'Status' => 'Directeur Production & Qualité', 'Ligne_Direct' => '0524-33-88-03'],
            ['Numéro' => '204', 'Nom' => 'ARROM', 'Prénom' => 'Abdelaziz', 'Status' => 'Directeur des Achats et Logistique', 'Ligne_Direct' => '0524-33-88-04'],
            ['Numéro' => '204', 'Nom' => 'FAOUZI', 'Prénom' => 'Soufiane', 'Status' => 'Agent des Achats et Logistique', 'Ligne_Direct' => '0524-33-88-04'],
            ['Numéro' => '205', 'Nom' => 'KADDA', 'Prénom' => 'Yassine', 'Status' => 'Responsable Développement', 'Ligne_Direct' => '0524-33-88-05'],
            ['Numéro' => '206', 'Nom' => 'EL GUAREH', 'Prénom' => 'Abdelatif', 'Status' => 'Responsable Stock et Sécurité', 'Ligne_Direct' => '0524-33-88-06'],
            ['Numéro' => '207', 'Nom' => 'AIT BIHI', 'Prénom' => 'Abdelmajid', 'Status' => 'Chef projet', 'Ligne_Direct' => '0524-33-88-07'],
            ['Numéro' => '208', 'Nom' => 'KARAMDEAL', 'Prénom' => '', 'Status' => 'PROSPECTION KARAMDEAL', 'Ligne_Direct' => '0524-33-88-08'],
            ['Numéro' => '209', 'Nom' => 'ELINTIDAMI', 'Prénom' => 'Mohamed', 'Status' => 'Chef projet', 'Ligne_Direct' => ''],
            ['Numéro' => '210', 'Nom' => 'ARROM', 'Prénom' => 'Abdelfattah', 'Status' => 'Président', 'Ligne_Direct' => ''],
            ['Numéro' => '211', 'Nom' => 'AZEROUAL', 'Prénom' => 'HASSAN', 'Status' => 'Technicien de support', 'Ligne_Direct' => ''],
            ['Numéro' => '211', 'Nom' => 'BADAHMANE', 'Prénom' => 'Bahaeeddine', 'Status' => 'Technicien de support', 'Ligne_Direct' => ''],
            ['Numéro' => '214', 'Nom' => 'LACHGER', 'Prénom' => 'Hasnaa', 'Status' => 'Chef projet', 'Ligne_Direct' => ''],
            ['Numéro' => '216', 'Nom' => 'TIRHOULA', 'Prénom' => 'Tarik', 'Status' => 'Chef projet', 'Ligne_Direct' => ''],
            ['Numéro' => '218', 'Nom' => 'TBATOU', 'Prénom' => 'Mohamed', 'Status' => 'Superviseur Production', 'Ligne_Direct' => ''],
            ['Numéro' => '219', 'Nom' => 'KAYA', 'Prénom' => 'Naima', 'Status' => 'Chef projet', 'Ligne_Direct' => ''],
            ['Numéro' => '222', 'Nom' => 'SALLE REUNION', 'Prénom' => '', 'Status' => '', 'Ligne_Direct' => ''],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
