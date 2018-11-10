<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtmParTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atm_par', function (Blueprint $table) {
            $table->integer('atm_id')->unsigned()->nullable();
            $table->foreign('atm_id')->references('id')
                ->on('atms')->onDelete('cascade');

            $table->integer('par_id')->unsigned()->nullable();
            $table->foreign('par_id')->references('id')
                ->on('pars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atm_par');
    }
}
