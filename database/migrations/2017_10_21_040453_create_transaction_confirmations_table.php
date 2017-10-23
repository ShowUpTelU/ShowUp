<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_confirmations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transactionId')->unsigned();
            $table->integer('type')->default(2)->comment('1 = client to show up, 2 = business to show up, 3 = show up to client, 4 = show up to business');
            $table->string('photo');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('transactionId')->references('id')->on('transactions')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_confirmations');
    }
}
