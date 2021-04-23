<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_tests', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('test_name');
            $table->integer('test_time');
            $table->date('test_date')->nullable();
            $table->text('test_description')->nullable();
            $table->integer('total')->default(0);
            $table->boolean('free')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_tests');
    }
}
