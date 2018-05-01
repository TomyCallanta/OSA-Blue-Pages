<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table){
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->binary('profile_pic');
            $table->string('account_type');
            $table->timestamps();
        });

        Schema::create('supplier', function (Blueprint $table){
            $table->increments('id');
            $table->string('company_name');
            $table->string('business_name')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_no');
            $table->string('email')->nullable();
            $table->string('fbpage')->nullable();
            $table->string('website')->nullable();
            $table->string('service_type');
            $table->string('state');
            $table->double('rating', 2, 1)->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('suggestion', function(Blueprint $table){
            $table->integer('supplier_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->text('note_to_admin')->nullable();
            $table->timestamps();
        });

        Schema::create('review', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->integer('rating');
            $table->text('review_content');
            $table->boolean('is_visible');
            $table->timestamps();
        });

        Schema::table('supplier', function(Blueprint $table){
            $table->foreign('admin_id')->references('id')->on('user');
        });

        Schema::table('suggestion', function(Blueprint $table){
            $table->foreign('supplier_id')->references('id')->on('supplier');
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('admin_id')->references('id')->on('user')->nullable();
        });


        Schema::table('review', function(Blueprint $table){
            $table->foreign('supplier_id')->references('id')->on('supplier');
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('admin_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('supplier');
        Schema::dropIfExists('suggestion');
        Schema::dropIfExists('review');
    }
}
