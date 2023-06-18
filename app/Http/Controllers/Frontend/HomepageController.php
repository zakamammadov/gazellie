<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
class HomepageController extends Controller
{
    public function index(){
        // $categories = Category::whereRaw('top_cat_id is null')->get();
        // return view('frontend.home',compact('categories'));
        return view('frontend.home');
    }
}
