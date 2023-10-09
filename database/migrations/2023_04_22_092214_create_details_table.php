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
        Schema::create('detalji', function (Blueprint $table) {
            $table->bigIncrements('detalji_id');
            $table->string('karoserija', 50);
            $table->float('broj_vrata');
            $table->double('broj_sedista');
            $table->string('menjac', 50);
            $table->string('vrsta_goriva', 20);
            $table->double('potrosnja');
            $table->string('klima', 20);
            $table->string('pogon', 20);
            $table->float('snaga_motora');
            $table->float('ubrazanje');
            $table->float('maks_brzina');
            $table->float('duzina');
            $table->float('sirina');
            $table->float('visina');
            $table->float('teznina_praznog');
            $table->float('maks_opter');
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
        Schema::dropIfExists('detalji');
    }
};
