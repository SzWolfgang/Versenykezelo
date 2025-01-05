<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // felhasználók tábla
        Schema::create('felhasznalok', function (Blueprint $table) {
            $table->string('nev', 100);
            $table->string('email', 255)->primary();
            $table->string('telefonszam', 20)->nullable();
            $table->string('lakcim', 255)->nullable();
        });

        // versenyek tábla
        Schema::create('versenyek', function (Blueprint $table) {
            $table->string('nev', 100);
            $table->year('ev');
            $table->string('elerheto_nyelvek', 100);
            $table->integer('pontko_jo')->default(0);
            $table->integer('pontok_rossz')->default(0);
            $table->integer('pontok_ures')->default(0);
            $table->primary(['nev', 'ev']);
            $table->unique(['nev', 'ev']);
        });

        // fordulók tábla
        Schema::create('fordulok', function (Blueprint $table) {
            $table->id();
            $table->string('verseny_nev', 100);
            $table->year('verseny_ev');
            $table->string('nev', 100);
            $table->dateTime('kezdes_idopont');
            $table->dateTime('zaras_idopont');
            $table->foreign(['verseny_nev', 'verseny_ev'])
                ->references(['nev', 'ev'])
                ->on('versenyek')
                ->onDelete('cascade');
            $table->index(['verseny_nev', 'verseny_ev']);
        });

        // versenyzők tábla
        Schema::create('versenyzok', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fordulo_id');
            $table->string('felhasznalo_id', 255);
            $table->foreign('fordulo_id')
                ->references('id')
                ->on('fordulok')
                ->onDelete('cascade');
            $table->foreign('felhasznalo_id')
                ->references('email')
                ->on('felhasznalok')
                ->onDelete('cascade');
            $table->index('fordulo_id');
            $table->index('felhasznalo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('versenyzok');
        Schema::dropIfExists('fordulok');
        Schema::dropIfExists('versenyek');
        Schema::dropIfExists('felhasznalok');
    }
};
