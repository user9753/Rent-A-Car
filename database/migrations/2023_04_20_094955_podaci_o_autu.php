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
        Schema::create('podaci_o_autu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50);
            $table->string('model', 50);
            $table->string('marka', 50);
            $table->integer('cena');
            $table->string('slika', 255);
            $table->datetime('created_at')->nullable();;
            $table->datetime('updated_at')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('podaci_o_autu');
    }
};
