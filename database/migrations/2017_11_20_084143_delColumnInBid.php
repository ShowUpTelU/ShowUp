<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DelColumnInBid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bids', function (Blueprint $table) {
             $table->dropColumn(['price', 'note']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bids', function (Blueprint $table) {
          $table->integer('advertisementId')->unsigned();
          $table->integer('price')->default(0)->unsigned();
        });
    }
}
