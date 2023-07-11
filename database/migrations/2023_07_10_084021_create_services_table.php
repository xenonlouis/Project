<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateServicesTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('Service');
            $table->string('Num_Telephone');
        });

        $data = [
            ['Service' => 'police secours', 'Num_Telephone' => '19'],
            ['Service' => 'Gendarmerie', 'Num_Telephone' => '117'],
            ['Service' => 'Pompiers', 'Num_Telephone' => '15'],
            ['Service' => 'service entreprise maroc telecom', 'Num_Telephone' => '0800 00 30 30'],
            ['Service' => 'service entreprise inwi', 'Num_Telephone' => '05 29 29 29 29'],
            ['Service' => 'support technique orange', 'Num_Telephone' => '05 20 12 11 21'],
            ['Service' => 'clinique ibn toufail', 'Num_Telephone' => '0524 43 63 53 - 0524 43 87 18'],
            ['Service' => 'clinique du sud', 'Num_Telephone' => '0524 44 79 99'],
            ['Service' => 'polyclinique de la cnss', 'Num_Telephone' => '0524 34 70 51'],
            ['Service' => 'polyclinique les narcisses', 'Num_Telephone' => '0524 44 75 75'],
            ['Service' => 'polyclinique de la koutoubia', 'Num_Telephone' => '0524 43 85 85'],
            ['Service' => 'ambulance trari', 'Num_Telephone' => '0524 44 37 24'],
            ['Service' => 'medecine d’urgence', 'Num_Telephone' => '0524 40 40 40'],
        ];

        DB::table('services')->insert($data);
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
