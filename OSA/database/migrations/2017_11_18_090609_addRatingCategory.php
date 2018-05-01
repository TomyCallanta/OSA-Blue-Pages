<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class addRatingCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function(Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->integer('rating');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('supplier_id')->references('id')->on('supplier');
        });

        Schema::create('category', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
        });

        Schema::table('supplier', function(Blueprint $table){
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating');
        Schema::dropIfExists('category');
        Schema::table('supplier', function(Blueprint $table){
            $table->dropColumn('category_id');
        });
    }
}
