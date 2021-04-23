<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMUserResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_user_results', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('test_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->float('result');
            $table->text('result_description')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['test_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_user_results');
    }
}
