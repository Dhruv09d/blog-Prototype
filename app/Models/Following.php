<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'following_id'
    ];
    // public function Following(User $user) {
    //     return $this->likes->contains('user_id', $user->id);
    // }
    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
