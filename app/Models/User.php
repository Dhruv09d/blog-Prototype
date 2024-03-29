<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function followBy(User $user) {
    //     //dd($this->followers->contains('follower_id', $user->id));
    //     return $this->followers->contains('follower_id', $user->id);
    // }

    public function post() {
        return $this->hasMany(Post::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    // public function followers() {
    //     return $this->hasMany(Follower::class);
    // }
    // public function following() {
    //     return $this->hasMany(Following::class);
    // }

    public function profile() {
        return $this->hasOne(Profile::class);
    }
    public function feedbacks() {
        return $this->hasMany(feedback::class);
    }
    public function postreports() {
        return $this->hasMany(Postreport::class);
    }
}
