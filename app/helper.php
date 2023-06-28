<?php
use App\Models\Category;

function get_cat($top_cat_id){

   return  Category::where('top_cat_id', $top_cat_id)->get();


}


?>
