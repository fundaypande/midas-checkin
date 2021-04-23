<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('feature_category_id')->unsigned()->nullable();
            $table->string('feature_master_name')->nullable();
            $table->string('feature_master_description')->nullable();
            $table->boolean('aktive')->default(1);
            $table->string('slug')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['feature_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_masters');
    }
}
