<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table="category";
    // protected $fillable=['cat_name_az','cat_name_en','cat_name_ru','slug'];
    protected $guarded=[];

}
