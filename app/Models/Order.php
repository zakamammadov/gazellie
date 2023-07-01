<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = "order";

    protected $guarded=[];

    public function cart_db()
    {
        return $this->belongsTo('App\Models\Cart_Model');
    }


}
