<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Product;
use App\Cart;
use App\Customer;


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
            $posts = Product::where('product_class', $search_product_class)->paginate(6);
        } else {
            $posts = Product::paginate(6);
        }
        $posts2 = Product::all();
        return ['posts' => $posts,'posts2' => $posts2, 'search_product_class' => $search_product_class];
    }

    public function index(Request $request)
    {
        //$request->session()->flush();
        $request->session()->put('cart.');
        $group_result = self::group($request);
        return view('front.ec_front1', ['posts' => $group_result['posts'], 'posts2' => $group_result['posts2'], 'search_product_class' => $group_result['search_product_class']]);
    }
        
    public function add_cart(Request $request)
    {
        //カートへの移動(session)
        //フォームからpostされた商品情報
        //$prefix = 'product_id-';
        //$search_product_cd = $prefix . $request->search_product_cd;
        
        //$request->session()->flush();
        
        $search_product_cd = $request->search_product_cd;//商品CD
            //dump("postされた商品CD: " . $search_product_cd);//★
        $search_product_quantity = intval($request->search_product_quantity);//商品数量
            //dump("postされた商品数量: " . $search_product_quantity);//★
        
        // if(session()->get("cart") == null)
        // {
        //     $request->session()->put('cart.');
        // }
            //sessionに商品が含まれるかチェック
            if(array_key_exists($search_product_cd, $request->session()->get("cart")))
            {
                //dump("↑この商品はすでにsession内にあったよ！");//★
                //既にsession内に商品CDがある場合
                //合致するキーの値を取り出し、数量を合算する
                $value = intval($request->session()->get('cart.' . $search_product_cd));
                $value_plus = intval($value + $search_product_quantity);
                //dump("ちなみに数量は: " . $value . "あり");//★
                //dump("今回の数量: " . $search_product_quantity . "と合わせ");//★
                //dump("合計: " . $value_plus . "をsessionに格納する");//★
                    // 合致するキーのデータを一旦セッションから削除する
                    unset($request->session()->get("cart")->$search_product_cd);
                    //sessionに改めてキーと合算数量を追加する
                    $request->session()->put('cart.' . $search_product_cd, $value_plus);
                    //$request->session()->get('cart')->forget('""');
                    //dump($request->session()->get('cart')->has('""'));
                    if ($exists = Session::exists('cart.' . '')) {
                        $request->session()->forget('cart.' . '');
                    }
                    //dump($request->session()->get("cart"));
                    
            }else{
                //sessionに追加する(既存がもしあった場合は上書きされる)
                //dump("↑この商品はsession内に無かったので、新規追加するよ！");//★
                $request->session()->put('cart.' . $search_product_cd, $search_product_quantity);
                if ($exists = Session::exists('cart.' . '')) {
                    $request->session()->forget('cart.' . '');
                }
            }
                //dump("↓↓ if判定はこう動きました・・・");//★
                //dump(array_key_exists($search_product_cd,$request->session()->get("cart")));//★
            //dump(session()->get('cart'));//★

            //カート用数値
            $a = session()->get('cart');
            $totalPrice = 0;
            foreach ($a as $b => $c) {
                //dump($b);
                $product_price = Product::where('product_cd', $b)->value('product_price');
                //dump($product_price);
                $subTotalPrice = $c * $product_price;
                $totalPrice += $subTotalPrice;
                //dump($subTotalPrice);
                $request->session()->put(['totalPrice' => $totalPrice]);
            }
            //dump("合計金額 :" . $totalPrice);//★
            // if(array_key_exists("", $request->session()->get("cart")))
            // {
            // array_shift($request->session()->get("cart"));
            // }
        //↓同Controller内の関数を使用する(self::関数名(引数))
        //↓関数から戻り値を受ける場合は変数に格納する
        $group_result = self::group($request);
        return back();
        
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
    
    public function order_form(Request $request)
    {
        //dump($request->session()->all());
        if ($request->session()->get('totalPrice') == 0) {
        //if ($exists = Session::exists('cart.' . '')) {
        return back();
        } else {
        $posts2 = Product::all();
        return view('front.ec_front2',['posts2' => $posts2]);//, ['posts' => $group_result['posts'], 'search_product_class' => $group_result['search_product_class']]);
        }
    }
    
    public function order(Request $request)
    {
        $request['customer_cd'] = 1111111;//後で直そう
        $this->validate($request, Customer::$rules);////バリデーション(エラー時は$errorsに自動で格納され、リダイレクト)
        $form = $request->all();
        unset($form['_token']);
        //dump($form);
        
        $customer = new Customer;
        $customer->fill($form)->save();
        return view('front.ec_front3');
    }
    
    public function delete(Request $request)
    {
        dump($request);
        //$request->session()->forget("del_product");
        return view('front.ec_front1');
    }
    
    
}