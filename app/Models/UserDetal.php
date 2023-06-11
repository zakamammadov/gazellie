<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetal extends Model
{
    protected $table='user_detal';
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;
}
