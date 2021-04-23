<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_discussions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('profile_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->text('chat')->nullable();
            $table->bigInteger('is_admin')->nullable()->unsigned();
            $table->bigInteger('is_user')->nullable()->unsigned();

            $table->boolean('readed')->nullable()->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'profile_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_discussions');
    }
}
