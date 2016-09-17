<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('condition_id')->unsigned()->index();
            $table->integer('quality_id')->unsigned()->index();
            $table->integer('type_id')->unsigned()->index();

            $table->float('price');
            $table->integer('keys');
            $table->string('name');
            $table->string('link');
            $table->string('image', 300);
            $table->boolean('stattrak');
            $table->timestamps();
        });

        DB::table('items')->insert(
            [
                ['condition_id' => '2', 'quality_id' => '6', 'type_id' => '2', 'price' => '3.15', 'keys' => '1', 'name' => 'MAC-10 | Neon Rider', 'link' => 'http://steamcommunity.com/market/listings/730/MAC-10%20%7C%20Neon%20Rider%20%28Minimal%20Wear%29', 'image' => '-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou7umeldf0Ob3fDxBvYyJmoWEmeX9N77DqWdY781lxOyQrIjw2ATmrkQ_YT2lcYbEcAJsNQqD_1fol7jnjJbp75nMmHI3vHI8pSGKtEQei0M', 'stattrak' => '0', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['condition_id' => '1', 'quality_id' => '4', 'type_id' => '3', 'price' => '3.11', 'keys' => '1', 'name' => 'FAMAS | Neural Net', 'link' => 'http://steamcommunity.com/market/listings/730/StatTrak%E2%84%A2%20FAMAS%20%7C%20Neural%20Net%20%28Factory%20New%29', 'image' => '-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLuoKhRf0v73dzxP7c-JkI-fhMj4OrzZgiVV65N327CTotT3iVfh-RY9Y2-hLNOWdwE4NwnT-FW4w-q5h8C0vs_N1zI97WjxIji5', 'stattrak' => '0', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['condition_id' => '1', 'quality_id' => '4', 'type_id' => '3', 'price' => '3.02', 'keys' => '1', 'name' => 'M4A1-S | Basilisk', 'link' => 'http://steamcommunity.com/market/listings/730/M4A1-S%20%7C%20Basilisk%20%28Factory%20New%29', 'image' => '-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhz2v_Nfz5H_uO3hb-Gw_alIITTl3hY5MxigdbN_Iv9nBrl80BrYz31IYOSdwY-Yl_Wr1C9xr3o05DuvJqazic3viZx7CuOzEO1n1gSObrYfbsp', 'stattrak' => '0', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['condition_id' => '3', 'quality_id' => '5', 'type_id' => '3', 'price' => '3.12', 'keys' => '1', 'name' => 'M4A4 | 龍王 (Dragon King)', 'link' => 'http://steamcommunity.com/market/listings/730/M4A4%20%7C%20%E9%BE%8D%E7%8E%8B%20%28Dragon%20King%29%20%28Field-Tested%29', 'image' => '-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhjxszFJTwW0924l4WYg-X1P4Tck29Y_cg_jLrEo4qtjgeyrkNrZ2qlI4aTIA5rMFzW8wW7yO3qgsDo78vJwHM17j5iuyiP9XXUyw', 'stattrak' => '0', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['condition_id' => '1', 'quality_id' => '1', 'type_id' => '8', 'price' => '6.40', 'keys' => '2', 'name' => 'CS:GO Weapon Case', 'link' => 'http://steamcommunity.com/market/listings/730/CS%3AGO%20Weapon%20Case', 'image' => '-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQNqhpOSV-fRPasw8rsRVx4MwFo5_T3eAQ3i6DMIW0X7ojiwoHax6egMOKGxj4G68Nz3-jCp4itjFWx-ktqfSmtcwqVx6sT', 'stattrak' => '0', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
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
        Schema::drop('items');
    }
}
