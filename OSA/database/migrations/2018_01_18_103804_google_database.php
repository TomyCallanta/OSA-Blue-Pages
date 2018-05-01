<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GoogleDatabase extends Migration
{
    /**
     * Run the migrations.
     * require to run 'composer require doctrine/dbal'
     *
     * @return void
     */
    public function up()
    {
      Schema::table('user', function ($table) {
        $table->string('google_id');
        $table->dropColumn('profile_pic');
        $table->string('avatar');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('user', function ($table) {
        $table->string('google_id');
        $table->binary('profile_pic');
        $table->dropColumn('avatar');   
      });
    }
}
