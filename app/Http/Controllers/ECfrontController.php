<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ECfrontController extends Controller
{
    public function front1()
    {
        return view('front.ec_front1');
    }
    public function front_default(Request $request)
    {
        $search_product_class = $request->search_product_class;
        if ($search_product_class != '') {
            $posts = Product::where('product_class', $search_product_class)->get();
        } else {
            $posts = Product::all();
        }
        return view('front.ec_front1', ['posts' => $posts, 'search_product_class' => $search_product_class]);
    }
}
