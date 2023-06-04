<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetal extends Model
{

    protected $fillable = [

        'user_id',
        'adress',
        'phone',
        'mob_phone'
    ];
    use HasFactory;
}
