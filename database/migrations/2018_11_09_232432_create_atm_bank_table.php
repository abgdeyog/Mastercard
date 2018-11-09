<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtmBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atm_bank', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('atm_id')->references('id')
                ->on('atms')->onDelete('cascade');

            $table->integer('bank_id')->unsigned()->nullable();
            $table->foreign('bank_id')->references('id')
                ->on('banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atm_bank');
    }
}
