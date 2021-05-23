<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_room_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();

            $table->string('room_type')->nullable();
            $table->text('room_desc')->nullable();
            $table->text('room_note')->nullable();
            $table->decimal('room_rate', 10,0)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_room_types');
    }
}
