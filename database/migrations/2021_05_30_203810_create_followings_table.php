<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // I can use either profile's user_id as refrence or users' id as both are same. 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //performed on
            $table->unsignedBigInteger('following_id');
            // foreign attribute(name displayed on followers table ), refrence attribute(name displayed on users table ), on attribute  (table name whose refrence is given) 
            $table->foreign('following_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('followings');
    }
}
