<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('room_type_id')->unsigned();


            $table->string('tipe_reservation')->nullable();
            $table->string('nama_depan')->nullable();
            $table->string('nama_belakang')->nullable();
            $table->string('company_name')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();

            $table->string('telephone_num')->nullable();
            $table->string('tanggal_checkin')->nullable();
            $table->string('tanggal_checkout')->nullable();
            $table->string('room_rate')->nullable();
            $table->string('no_room')->nullable();
            $table->string('total_pax')->nullable();
            $table->string('billing_instruction')->nullable();
            $table->string('remarks')->nullable();
            $table->string('ttd')->nullable();


            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'tipe_reservation']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_reservations');
    }
}
