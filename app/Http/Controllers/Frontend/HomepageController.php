<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
class HomepageController extends Controller
{
    public function index(){
        $categories = Category::whereRaw('top_cat_id is null')->get();
        //  $bot_cats = Category::where('top_cat_id', $cat->id)->get();
        return view('frontend.home',compact('categories'));

    }
}
