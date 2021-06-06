<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'follower_id'
    ];

    // public function checkIfUserFollowingThisOrNot(Follower $followers, $loggedin_user_id) {
    //     if (in_array($loggedin_user_id, $followers->follower_id)) {
    //         return true;
    //     }else {
    //         return false;
    //     }
    //     // return $this->followers->contains("follower_id", $loggedin_user->id);
    // }

    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
