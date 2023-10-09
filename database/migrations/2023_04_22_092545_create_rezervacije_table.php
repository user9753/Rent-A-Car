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
        Schema::create('rezervacije', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('from_date');
            $table->date('to_date');
            $table->text('message')->nullable();
            $table->unsignedInteger('id_korisnika')->nullable();
            $table->foreign('id_korisnika')->references('id')->on('users')->onDelete('set null');
            $table->unsignedInteger('id_vozila')->nullable();
            $table->foreign('id_vozila')->references('id')->on('podaci_o_autu')->onDelete('set null');
            $table->integer('current_price');
            $table->integer('accepted')->nullable();
            $table->timestamps();

            // $table->foreign('id_korisnika')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('id_vozila')->references('id')->on('podaci_o_autu')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rezervacije');
    }
};
