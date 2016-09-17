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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('defkeys');
            $table->integer('keys');
            $table->float('defmoney');
            $table->float('money');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            [
                ['name' => 'chikaldirick', 'email' => 'chikaldirick@gmail.com', 'password' => '$2y$10$UvCD15gml3q6CDlu.aQMWuFmORh7tMefqoS1PNUeuqm.VaZYD0FYu', 'defkeys' => '0', 'keys' => '10', 'defmoney' => '1.65', 'money' => '0.42', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ]
        );
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
