<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->longText('description');
            $table->string('image_path');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            // PK -> id of users' table | FK -> user_id of posts' table
            $table->foreign('user_id')->references('id')->on('users'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
