<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['clientId']);
            $table->renameColumn('clientId', 'bidId');
            $table->foreign('bidId')->references('id')->on('bids')->onDelete('cascade')->onUpdate('cascade');
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
            $table->dropForeign(['bidId']);
            $table->renameColumn('bidId', 'clientId');
            $table->foreign('clientId')->references('id')->on('bids')->onDelete('cascade')->onUpdate('cascade');
        });
    }
}
