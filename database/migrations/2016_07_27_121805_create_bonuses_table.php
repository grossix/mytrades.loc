<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->float('profit');
            $table->string('description', 500)->nullable();
            $table->timestamps();
        });

        DB::table('bonuses')->insert(
            [
                ['user_id' => '1', 'profit' => '0.05', 'description' => 'Sold Summer Sale 2016 Trading Card', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 1), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 1)],
                ['user_id' => '1', 'profit' => '0.05', 'description' => 'Sold Summer Sale 2016 Trading Card', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 2), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 2)],
                ['user_id' => '1', 'profit' => '0.05', 'description' => 'Sold Summer Sale 2016 Trading Card', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 2), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 2)],
                ['user_id' => '1', 'profit' => '0.14', 'description' => 'Saved 0.04$ on the buying key (bought on from the market for 2.35 instead of 2.49)', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 2), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 2)],
                ['user_id' => '1', 'profit' => '0.06', 'description' => 'Sold Summer Sale 2016 Trading Card', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 3), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 3)],
                ['user_id' => '1', 'profit' => '0.06', 'description' => 'Sold Summer Sale 2016 Trading Card', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 3), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 3)],
                ['user_id' => '1', 'profit' => '0.06', 'description' => 'Sold Summer Sale 2016 Trading Card', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 4), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 4)],
                ['user_id' => '1', 'profit' => '0.06', 'description' => 'Sold Summer Sale 2016 Trading Card', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 4), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 4)],
                ['user_id' => '1', 'profit' => '4.98', 'description' => 'Won ESL Cologne 2016 Nuke Souvenir Package (traded it for 2 cases)', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 8), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 8)],
                ['user_id' => '1', 'profit' => '0.06', 'description' => 'Got AK-47 | Safari Mesh (FT) from a trade for free', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 8), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 8)],
                ['user_id' => '1', 'profit' => '0.04', 'description' => 'Saved 0.04$ on the buying key (bought on from the market for 2.45 instead of 2.49)', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 11), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 11)],
                ['user_id' => '1', 'profit' => '-0.78', 'description' => 'Bought 5 games on Steam Market (less 0.2$ each): Urja, Cube Destroyer, The Last Photon, Cyborg Detonator, Caveman World: Mountains of Unga Boonga', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 12), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 12)],
                ['user_id' => '1', 'profit' => '7.61', 'description' => 'Won M4A1-S | Cyrex (WW) from csgocosmos.net (had to win 40 1vs1 games and raise up from 1000 (1$) redeemed points to 8k+-)', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 13), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 13)],
                ['user_id' => '1', 'profit' => '-0.36', 'description' => 'Bought 2 games on Steam Market (less 0.2$ each): Flight of the Paladin, GooCubelets: OCD', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 23), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 23)],
                ['user_id' => '1', 'profit' => '-0.19', 'description' => 'Bought 1 game on Steam Market (less 0.2$): Sins Of The Demon', 'created_at' => \Carbon\Carbon::createFromDate(2016, 7, 27), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 7, 27)],
                ['user_id' => '1', 'profit' => '-0.18', 'description' => 'Bought 1 game on Steam Market (less 0.2$): Space Pilgrim Episode III: Delta Pavonis', 'created_at' => \Carbon\Carbon::createFromDate(2016, 8, 2), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 8, 2)],
                ['user_id' => '1', 'profit' => '-0.19', 'description' => 'Bought 1 game on Steam Market (less 0.2$): Spaceport Hope', 'created_at' => \Carbon\Carbon::createFromDate(2016, 8, 2), 'updated_at' => \Carbon\Carbon::createFromDate(2016, 8, 2)],
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
        Schema::drop('bonuses');
    }
}
