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
        
        //フォームからpostされた商品情報
        $prefix = 'product_id-';
        $search_product_cd = $prefix . $request->search_product_cd;//商品CD
            dump("postされた商品CD: " . $search_product_cd);//★
        $search_product_quantity = intval($request->search_product_quantity);//商品数量
            dump("postされた商品数量: " .$search_product_quantity);//★
        //sessionに商品が含まれるかチェック
        if($request->session()->exists($search_product_cd))
        {
            dump("↑この商品はすでにsession内にあったよ！");//★
            //既にsession内に商品CDがある場合
            //合致するキーの値を取り出し、数量を合算する
            $value = intval($request->session()->get($search_product_cd));
            $value_plus = intval($value + $search_product_quantity);
            dump("ちなみに数量は: " . $value . "あり");//★
            dump("今回の数量: " . $search_product_quantity . "と合わせ");//★
            dump("合計: " . $value_plus . "をsessionに格納する");//★
                // 合致するキーのデータを一旦セッションから削除する
                $request->session()->forget($search_product_cd);
                //sessionに改めてキーと合算数量を追加する
                $request->session()->put('cart.' . $search_product_cd, $value_plus);            
        }else{
            //sessionに追加する
            dump("↑この商品はsession内に無かったので、新規追加するよ！");//★
            
            $request->session()->put('cart.' . $search_product_cd, $search_product_quantity);
        }

        //die;
        //$request->session()->flush();
        dump(session()->get('cart'));//★
        
        //cartへ商品明細と合計金額を表示させる
        
        
        
        
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
