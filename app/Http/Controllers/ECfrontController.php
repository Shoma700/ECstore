<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Cart;
//↓共通関数はこちら
use App\libs\Common_Function;

class ECfrontController extends Controller
{
    // public function front1()
    // {
    //     return view('front.ec_front1');
    // }
    
    public function front1(Request $request)
    {
        Common_Function::group($request);
        
        // //カテゴリの絞り込み(同一のものを共通関数側にも格納)
        // $search_product_class = $request->search_product_class;
        // // dd($search_product_class);
        // if ($search_product_class != '') {
        //     $posts = Product::where('product_class', $search_product_class)->paginate(5);
        // } else {
        //     //$posts = Product::all();
        //     $posts = Product::paginate(5);
        // }
        return view('front.ec_front1', ['posts' => $posts, 'search_product_class' => $search_product_class]);
    }    
        
    public function front2(Request $request)
    {
        
        Common_Function::group($request);
        //カートへの移動
        //検索された商品コードの商品情報をproductsテーブルから取得する
        //$request->session()->put('search_product_cd',1);
        // グローバルヘルパ使用
        session(['search_product_cd' => 1, 'search_product_quantity' => 1]);
        //dump(session());
            //$search_product_result = Product::find($request->session()->put(search_product_cd,));
            //if (empty($search_product_result)) {
            //} else {
            //dump($request->session()->get('search_product_cd'));
            //dump($request->session()->get('search_product_quantity'));  
            //$cart = new Cart;
            //return redirect('front/ec_front1');
            //$cart->save();
            //}
        return redirect('/');//, ['posts' => $posts]);
            // $posts = Product::all();
            // return view('front.ec_front1', ['posts' => $posts]);
    }
}
