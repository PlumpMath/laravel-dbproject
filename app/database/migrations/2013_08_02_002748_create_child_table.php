<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChildTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date_of_birth');
            $table->integer('age');
            $table->integer('grade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('school');//Possibly exchanged for school ID should we be able to compile a list of schools
            $table->integer('gender');
            $table->boolean('returning_player');
            $table->integer('parent_id');
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
        Schema::drop('child');
    }

}
