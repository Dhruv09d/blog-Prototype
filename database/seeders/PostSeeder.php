<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id_counter = 36; 
        $faker = Faker::create();
        for($i = 0; $i < 100; $i++) {
            $user_id_counter += 1;
            DB::table('posts')->insert([
                'slug' =>  $faker->slug,
                'title'  => $faker->company,
                'description'  => "Apart from counting words and characters, our online editor can help you to improve word choice and  writing style, and, optionally, help you to detect grammar mistakes and plagiarism. To check word count, simply place your cursor into the text box above and start typing. You'll see the number of characters and words increase or decrease as you type, delete, and edit them. You can also copy and paste text from another program over into the online editor above. The Auto-Save feature will make sure you won't lose any changes while editing, even if you leave the site and come back later. ",
                'image_path' => "610a82fd2c8b5-test 4.jpg",
                'user_id' => $user_id_counter,
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }
    }
}
