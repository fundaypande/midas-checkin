<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('feature_name')->default('Feature');;
            $table->bigInteger('feature_master_id')->unsigned()->nullable();
            $table->boolean('general')->default(0);
            $table->boolean('in_menu')->default(1);
            $table->boolean('aktive')->default(1);
            $table->text('description')->nullable();


            $table->timestamps();
            $table->softDeletes();

            $table->index(['feature_master_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
}
