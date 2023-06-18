<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdController extends Controller
{
    public function index($prod_slug)
    {
          return view('frontend.product');
    }
}
