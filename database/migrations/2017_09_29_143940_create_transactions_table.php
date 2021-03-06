<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clientId')->unsigned();
            $table->integer('businessId')->unsigned();
            $table->integer('price')->default(0);
            $table->integer('status')->default(0)->comment('0 = business paid, 1 = show up pay to client');
            $table->string('confirmPhoto')->nullable();
            $table->text('note');
            $table->timestamps();

            $table->foreign('clientId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('businessId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
