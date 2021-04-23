<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_points', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('question_id')->unsigned();
            $table->string('point');
            $table->text('point_description')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['question_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_points');
    }
}
