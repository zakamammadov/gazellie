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
    public function product()
    {
        return $this->belongsToMany('App\Models\Product', 'category_product');
    }
    public function bottom_kategoriler()
    {
        return $this->hasMany('App\Models\Category', 'top_cat_id', 'id');
    }
    public function top_category(){
        return $this->belongsTo('App\Models\Category', 'top_cat_id')->withDefault([
            'cat_name_en'=>'Top Category'
        ]);

    }



}



