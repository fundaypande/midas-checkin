<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('feature_id')->unsigned()->nullable();
            $table->bigInteger('action_id')->unsigned()->nullable();
            $table->string('action')->nullable();
            $table->string('old_user_name')->nullable();
            $table->text('description')->nullable();
            $table->string('table_name')->nullable();
            $table->text('old_data')->nullable();
            $table->boolean('restored')->default(0)->nullable();

            $table->timestamps();
            $table->index(['user_id', 'created_at', 'action', 'feature_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
