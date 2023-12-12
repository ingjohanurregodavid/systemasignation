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
        Schema::create('asignation_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idStudent');
            $table->unsignedInteger('idSubject');
            $table->unsignedInteger('idProfessor');

            $table->foreign('idStudent')->references('id')->on('students');
            $table->foreign('idSubject')->references('id')->on('subjects');
            $table->foreign('idProfessor')->references('id')->on('professors');
            // Garantiza que un estudiante no pueda repetir la misma asignatura con varios profesores
            $table->unique(['idStudent', 'idSubject']);
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
        Schema::dropIfExists('asignation_subjects');
    }
};
