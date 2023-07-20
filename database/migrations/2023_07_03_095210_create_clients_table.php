<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Nom');
            $table->string('Prénom')->nullable();
            $table->string('Adresse')->nullable();
            $table->string('Ville')->nullable();
            $table->string('Pays')->nullable();
            $table->string('Tel_fix')->nullable();
            $table->string('Tel_Portable')->nullable();
            $table->string('Tel_fix2')->nullable();
            $table->string('Tel_Portable2')->nullable();
            $table->string('Email')->nullable();
            $table->string('Position')->nullable();
            $table->string('Commentaire')->nullable();
            $table->string('Intitulé');
            $table->string('Fax')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
