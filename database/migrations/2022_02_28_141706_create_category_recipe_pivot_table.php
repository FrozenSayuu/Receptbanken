<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryRecipePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
        Schema::create('category_recipe', function (Blueprint $table)
        {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('recipe_id');
            
=======
        Schema::create('category_recipe', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('recipe_id');

>>>>>>> 6d32f8e6f3335937a2f6893fb2dbb4b3e655ddb5
            $table->primary(['category_id', 'recipe_id']);
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('recipe_id')->references('id')->on('recipes');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_recipes');
    }
}
