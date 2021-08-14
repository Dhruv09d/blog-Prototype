<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id_counter = 19;
        $faker = Faker::create();
        for($i = 0; $i < 100; $i++) {
            DB::table('profiles')->insert([
                'user_id' => $user_id_counter,
                'avatar_path'  => "610d336368c87-18.jpg" ,
                'biography'  => $faker->sentence,
                'instagram' => "https://www.instagram.com/",
                'facebook' => "https://www.facebook.com/",
                'twitter' =>  "https://twitter.com/",
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
            $user_id_counter += 1;
        }
    }
}
