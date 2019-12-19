<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Cart;

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
        //検索された商品コードの商品情報をproductsテーブルから取得する
        
        $search_product_cd = Product::find($request->search_product_cd);
         if (empty($search_product_cd)) {
         } else {
        dump($request->get('search_product_cd'));
        dump($request->get('search_product_quantity'));  
        //abort(404);   
        //dd($search_product_cd);
        //dd($search_product_quantity);
        $cart = new Cart;
        //return redirect('front/ec_front1');
        }
        
        return view('front.ec_front1', ['posts' => $posts]);
        // $posts = Product::all();
        // return view('front.ec_front1', ['posts' => $posts]);
    }
}
