<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_test_questions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('test_id')->unsigned();
            $table->bigInteger('question_id')->unsigned();

            $table->timestamps();

            $table->index(['test_id', 'question_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_test_questions');
    }
}
