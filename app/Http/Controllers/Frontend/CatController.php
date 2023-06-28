<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CatController extends Controller
{
    public function index($cat_slug){
        $category = Category::where('slug', $cat_slug)->firstOrFail();
        $categories = Category::whereRaw('top_cat_id is null')->get();
        $products=$category->product;

        // $bot_cats = Category::where('top_cat_id', $category->id)->get();
        // $top_cat = Category::find($category->top_cat_id);
        return view('frontend.category',compact('category','categories','products'));
    }
}
