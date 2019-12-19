<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;


class ECfrontController extends Controller
{
    // public function front1()
    // {
    //     return view('front.ec_front1');
    // }
    
    public function front1(Request $request)
    {
        //カテゴリの絞り込み
        $search_product_class = $request->search_product_class;
        // dd($search_product_class);
        if ($search_product_class != '') {
            $posts = Product::where('product_class', $search_product_class)->get();
        } else {
            $posts = Product::all();
        }
        
        
        //カートへの移動
        // $stock_product_cd = $request->stock_product_cd;
        // //dd($stock_product_cd);
        // $cart = Cart::find($$request->stock_product_cd);
        // //dd($news);
        // if (empty($news)) {
        // abort(404);    
        // }
        
        return view('front.ec_front1', ['posts' => $posts]);
        // $posts = Product::all();
        // return view('front.ec_front1', ['posts' => $posts]);
    }
}
