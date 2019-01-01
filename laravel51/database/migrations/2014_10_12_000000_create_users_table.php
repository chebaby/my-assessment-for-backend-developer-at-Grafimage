<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * For the test/simplicity purpose, i will create those rows in the user table,
         * But in real life we have to separate each row to it specific table
         * i.e Roles, Surveys, Questions, Answers
         */
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('firm');
            $table->string('role')->default('user');
            $table->string('password', 60);
            $table->string('sector');
            $table->string('question_one');
            $table->string('question_two');
            $table->string('question_three');
            $table->string('favorite_slot');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
