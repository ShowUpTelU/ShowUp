<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['bidId']);
            $table->dropColumn(['bidId']);
            $table->integer('price')->default(0);
            $table->tinyInteger('paid')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['price', 'paid']);
            $table->integer('bidId')->unsigned();
            $table->foreign('bidId')->references('id')->on('bids')->onDelete('cascade')->onUpdate('cascade');
        });
    }
}
