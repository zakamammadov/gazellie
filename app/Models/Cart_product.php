<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Cart_product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $table='cart_product';
}
