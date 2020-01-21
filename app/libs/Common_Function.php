<?php
namespace app\libs;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
Class Common_Function
{
    public static function group($request)
    {
        //カテゴリの絞り込み(同一のものを共通関数側にも格納)
        $search_product_class = $request->search_product_class;
        // dd($search_product_class);
        if ($search_product_class != '') {
            $posts = Product::where('product_class', $search_product_class)->paginate(6);
            //return (['posts' => $posts, 'search_product_class' => $search_product_class]);
        } else {
            //$posts = Product::all();
            $posts = Product::paginate(6);
            //return (['posts' => $posts, 'search_product_class' => $search_product_class]);
        }
        return view('front.ec_front1', ['posts' => $posts, 'search_product_class' => $search_product_class]);
    }
    
}