<?php

namespace App\Models;
//use App\Models\Follower;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'avatar_path',
        'biography',
        'instagram',
        'facebook',
        'twitter'
    ];
    
    // public function followBy(User $user) {
    //     //dd($this->followers->contains('follower_id', $user->id));
    //     return $this->followwer->contains('follower_id', $user->id);
    // }


    public function followers() {
        return $this->hasMany(Follower::class);
    }
    public function following() {
        return $this->hasMany(Following::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
