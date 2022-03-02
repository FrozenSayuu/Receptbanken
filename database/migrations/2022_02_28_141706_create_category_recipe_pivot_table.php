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
        Schema::create('category_recipe', function (Blueprint $table)
        {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('recipe_id');
            
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
