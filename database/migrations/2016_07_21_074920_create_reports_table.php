<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('keys');
            $table->float('money');
            $table->text('description');
            $table->timestamps();
        });

        DB::table('reports')->insert(
            [
                ['user_id' => '1', 'keys' => '0', 'money' => '1.65', 'description' => 'Initial value after registration', 'created_at' => \Carbon\Carbon::create(2016, 7, 1, 11, 17, 0), 'updated_at' => \Carbon\Carbon::create(2016, 7, 1, 11, 17, 0)],
                ['user_id' => '1', 'keys' => '1', 'money' => '0.07', 'description' => '', 'created_at' => \Carbon\Carbon::create(2016, 7, 2, 12, 48, 0), 'updated_at' => \Carbon\Carbon::create(2016, 7, 2, 12, 48, 0)],
                ['user_id' => '1', 'keys' => '3', 'money' => '1.17', 'description' => 'Dropped souvenir case', 'created_at' => \Carbon\Carbon::create(2016, 7, 8, 19, 41, 0), 'updated_at' => \Carbon\Carbon::create(2016, 7, 8, 19, 41, 0)],
                ['user_id' => '1', 'keys' => '4', 'money' => '0.6', 'description' => '', 'created_at' => \Carbon\Carbon::create(2016, 7, 11, 21, 51, 0), 'updated_at' => \Carbon\Carbon::create(2016, 7, 11, 21, 51, 0)],
                ['user_id' => '1', 'keys' => '7', 'money' => '0.4', 'description' => 'Dropped M4 Cyrex from csgocosmos', 'created_at' => \Carbon\Carbon::create(2016, 7, 13, 10, 34, 0), 'updated_at' => \Carbon\Carbon::create(2016, 7, 13, 10, 34, 0)],
                ['user_id' => '1', 'keys' => '8', 'money' => '0.1', 'description' => '', 'created_at' => \Carbon\Carbon::create(2016, 7, 20, 11, 45, 0), 'updated_at' => \Carbon\Carbon::create(2016, 7, 20, 11, 45, 0)],
                ['user_id' => '1', 'keys' => '9', 'money' => '0.1', 'description' => '', 'created_at' => \Carbon\Carbon::create(2016, 7, 26, 12, 11, 0), 'updated_at' => \Carbon\Carbon::create(2016, 7, 26, 12, 11, 0)],
                ['user_id' => '1', 'keys' => '10', 'money' => '0.0', 'description' => '', 'created_at' => \Carbon\Carbon::create(2016, 8, 1, 12, 47, 0), 'updated_at' => \Carbon\Carbon::create(2016, 8, 1, 12, 47, 0)],
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
        Schema::drop('reports');
    }
}
