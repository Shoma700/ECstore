<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Cart;
//↓共通関数はこちら別クラス
use App\libs\Common_Function;

class ECfrontController extends Controller
{
    
    //クラスメソッドでもインスタンスメソッドでもない
    //ただの関数↓
    public function group($request){
        //カテゴリの絞り込み
        $search_product_class = $request->search_product_class;
        if ($search_product_class != '') {
            $posts = Product::where('product_class', $search_product_class)->paginate(5);
        } else {
            //$posts = Product::all();
            $posts = Product::paginate(5);
        }
        return ['posts' => $posts, 'search_product_class' => $search_product_class];
    }


    public function front1(Request $request)
    {
        $group_result = self::group($request);
        return view('front.ec_front1', ['posts' => $group_result['posts'], 'search_product_class' => $group_result['search_product_class']]);
    }    
        
    public function front2(Request $request)
    {
        //カートへの移動(session)
        //$request->session()->put('search_product_cd',1);
        //session(['search_product_cd' => 111, 'search_product_quantity' => 222]);
        $search_product_cd = $request->search_product_cd;
        $search_product_quantity = $request->search_product_quantity;
        session([$search_product_cd => $search_product_quantity]);
        //dump(session());
        ★if (session)
        
        //↓同Controller内の関数を使用する(self::関数名(引数))
        //↓関数から戻り値を受ける場合は変数に格納する
        $group_result = self::group($request);
        //return back();
        
        
        //return view('front.ec_front1', ['posts' => $group_result['posts'], 'search_product_class' => $group_result['search_product_class']]);
        //return view('front.ec_front1', ['posts' => $result_array[0], 'search_product_class' => $result_array[1]]);
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
        //return redirect('/');//, ['posts' => $posts]);
            // $posts = Product::all();
            // return view('front.ec_front1', ['posts' => $posts]);
    }
}
