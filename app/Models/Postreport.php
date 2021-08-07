<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postreport extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'complainent_id',
        'selectedType',
        'reason',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function post() {
        return $this->belongsTo(Post::class);
    }
}
