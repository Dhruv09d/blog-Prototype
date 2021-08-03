<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'admin_avatar',
        'password',
        'phone_no',
        'email',

    ];
}
