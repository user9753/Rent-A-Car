<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('akcije', function (Blueprint $table) {
//             $table->id();
//             $table->unsignedInteger('id_vozila')->nullable();
//             $table->foreign('id_vozila')->references('id')->on('podaci_o_autu')->onDelete('set null');
//             $table->decimal('akcijska_cena', 10, 2);
//             $table->dateTime('vreme_trajanja_akcije');
//             // Dodajte ostale kolone koje su vam potrebne
//             $table->timestamps();
//         });
//     }

//     public function down()
//     {
//         Schema::dropIfExists('akcije');
//     }
// };