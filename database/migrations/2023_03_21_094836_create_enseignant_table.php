<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignant', function (Blueprint $table) {
            $table->integer('cin');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('mot de passe');
            $table->string('specialite');
            $table->string('repartition_horaire');
            $table->string('niveaux');
            $table->string('fiche_de_paie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enseignant');
    }
};
