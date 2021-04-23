<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_categories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('feature_category_name')->nullable();
            $table->string('feature_category_description')->nullable();
            $table->boolean('aktive')->default(1);
            $table->string('icon')->nullable();

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
        Schema::dropIfExists('feature_categories');
    }
}
