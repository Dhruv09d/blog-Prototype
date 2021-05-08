<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'slug',
        'user_id',
    ];


    //check if a user liked a post already So that one user can like a psot only once.
    public function likedBy(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }



    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function sluggable():array {
        return [
            'slug' => [
            'source' => 'title'
            ]
        ];
    }
}
