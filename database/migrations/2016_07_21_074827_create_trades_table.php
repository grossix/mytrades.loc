<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('item_id')->unsigned()->index();
            $table->integer('keys');
            $table->float('profit');
            $table->timestamps();
        });

        DB::table('trades')->insert(
            [
                ['user_id' => '1', 'item_id' => '1', 'keys' => '1', 'profit' => '0.36', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 9), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 9)],
                ['user_id' => '1', 'item_id' => '1', 'keys' => '1', 'profit' => '0.19', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 10), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 10)],
                ['user_id' => '1', 'item_id' => '2', 'keys' => '1', 'profit' => '0.31', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 11), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 11)],
                ['user_id' => '1', 'item_id' => '4', 'keys' => '1', 'profit' => '0.30', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 19), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 19)],
                ['user_id' => '1', 'item_id' => '5', 'keys' => '2', 'profit' => '0.53', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 20), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 20)],
                ['user_id' => '1', 'item_id' => '1', 'keys' => '1', 'profit' => '0.21', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 22), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 22)],
                ['user_id' => '1', 'item_id' => '3', 'keys' => '1', 'profit' => '0.29', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 22), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 22)],
                ['user_id' => '1', 'item_id' => '1', 'keys' => '1', 'profit' => '0.24', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 22), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 22)],
                ['user_id' => '1', 'item_id' => '1', 'keys' => '1', 'profit' => '0.23', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 23), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 23)],
                ['user_id' => '1', 'item_id' => '5', 'keys' => '2', 'profit' => '0.51', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 27), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 27)],
                ['user_id' => '1', 'item_id' => '1', 'keys' => '1', 'profit' => '0.32', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 29), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 29)],
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
        Schema::drop('trades');
    }
}
