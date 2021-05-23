<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPropertySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_property_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();

            $table->string('owner_name')->nullable();
            $table->string('property_name')->nullable();
            $table->string('property_adress')->nullable();
            $table->text('billing_info')->nullable();

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
        Schema::dropIfExists('m_property_settings');
    }
}
