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
            $table->string('Prénom');
            $table->string('Societe');
            $table->string('Adresse');
            $table->string('Ville');
            $table->string('Pays');
            $table->string('Tel_fix');
            $table->string('Tel_Portable')->nullable();
            $table->string('Email');
            $table->string('Position');
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
