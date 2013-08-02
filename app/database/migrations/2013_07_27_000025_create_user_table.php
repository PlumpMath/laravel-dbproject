<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function(Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone', 10);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('street_address', 40);
            $table->string('city', 45);
            $table->string('state', 2);
            $table->string('zip_code', 6);
            $table->string('last_logged_in_from', 12);
            $table->timestamp('last_logged_in_at');
            $table->boolean('stay_logged_in');
            $table->boolean('active');
            $table->timestamp('deleted_at');
            $table->timestamps();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }

}
