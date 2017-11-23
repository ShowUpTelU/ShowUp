<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnDueDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->unsignedSmallInteger('dueDate')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->date('dueDate')->change();
        });
    }
}
