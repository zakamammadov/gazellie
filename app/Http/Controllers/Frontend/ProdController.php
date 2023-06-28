<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProdController extends Controller
{
    public function index($prod_slug)
    {
        $categories = Category::whereRaw('top_cat_id is null')->get();
        $product = Product::whereSlug($prod_slug)->firstOrFail();
        $pr_category=Product::take(4)->get();
          return view('frontend.product',compact('categories','product','pr_category'));
    }
}
