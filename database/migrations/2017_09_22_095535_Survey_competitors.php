<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SurveyCompetitors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_competitors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('survey_id')->unsigned();
            $table->integer('type')->default(1);
            $table->integer('job_vacancy')->default(0);
            $table->integer('data_security')->default(0);
            $table->integer('editing')->default(0);
            $table->integer('cs')->default(0);
            $table->integer('price')->default(0);
            $table->integer('location')->default(0);

            $table->foreign('survey_id')->references('id')->on('surveys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_competitors');
    }
}
