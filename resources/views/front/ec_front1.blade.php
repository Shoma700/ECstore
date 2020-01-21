@extends('layouts.ec_base_front1')

@section('content')
    <header>
        <div class="container">
            <div class="header-title-area">
                <h1 class="logo">ECフロント画面</h1>
                <p class="text-sub">スケートボード商品を提供します。</p>
            </div>
            {{-- 商品分類で絞りこみ --}}
            <ul class="header-navigation">
                <li class="hover"><a href="{{ action('ECfrontController@front1', ['search_product_class' => '']) }}">全て</a></li>
                <li class="hover"><a href="{{ action('ECfrontController@front1', ['search_product_class' => 'デッキ']) }}">デッキ</a></li>
                <li class="hover"><a href="{{ action('ECfrontController@front1', ['search_product_class' => 'トラック']) }}">トラック</a></li>
                <li class="hover"><a href="{{ action('ECfrontController@front1', ['search_product_class' => 'ウィール']) }}">ウィール</a></li>
                <li class="hover"><a href="{{ action('ECfrontController@front1', ['search_product_class' => 'ベアリング']) }}">ベアリング</a></li>
                <li class="hover"><a href="{{ action('ECfrontController@front1', ['search_product_class' => 'メンテナンス']) }}">メンテナンス</a></li>
                <li class="hover"><a href="{{ action('ECfrontController@front1', ['search_product_class' => 'シューズ']) }}">シューズ</a></li>
                <li class="hover"><a href="{{ action('ECfrontController@front1', ['search_product_class' => 'その他']) }}">その他</a></li>
            </ul>
            {{-- ↑ ↑ ↑ --}}
        </div>
    </header>
    <div class="main">
        <div class="container">
            {{-- 左側 --}}
            <div class="left-contents">
                <div class="card-contents">
                    <h4 class="text-title">商品一覧</h4>
                </div>
                <div class="card-contents">
                    <div class="product-list-area">
                        
                        @foreach($posts as $p_list)
                        <div class="product-list">
                            <img src="{{ asset('storage/image/' . $p_list->product_image_path) }}" class="product-image">
                            <p class="product-name">{{ mb_substr($p_list->product_name, 0, 12) }}</p>
                            <p class="product-price">￥{{ $p_list->product_price }}</p>
                            
                            {{-- フォーム1 --}}
                            <form action="{{ action('ECfrontController@front2') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="search_product_cd" rows="1" value="{{ $p_list->product_cd }}" >
                                <p><input class="num_text" type="text" name="search_product_quantity" rows="1">--数量</p>
                                <div>
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary" value="カートへ追加">
                                </div>
                            </form>
                            {{-- ↑ ↑ ↑ --}}
                        </div>
                        @endforeach
                    </div>
                </div>
                {{ $posts->links() }}
                {{--  --}}
                <div class="card-contents">
                    <h4 class="text-title2"></h4>
                </div>
            </div>
            {{-- 右側 --}}
            <div class="right-contents">
                <div class="card-contents">
                    <h4 class="text-title">カート</h4>
                </div>
                <div>
                {{-- カート内が空の場合は処理スキップ --}}
                @if(session()->get('cart') != "")
                    @php
                    $totalprice = 0;
                    @endphp
                        @foreach(session()->get('cart') as $product_cd => $quantity)
                            @foreach($posts2 as $aaa)
                                @if($aaa->product_cd == $product_cd)
                                    <p>
                                        <label class="text-title2">{{ $aaa->product_name }}</label>
                                        <label> : </label>
                                        <label>{{ $quantity }}個</label>
    
                                        <hr style="border:1px dashed #000000;">
                                    </p>
                                    @php
                                        $totalprice += $aaa->product_price * $quantity;
                                    @endphp
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div>
                        <hr>
                        <h4 class="text-title2">合計金額 : {{ $totalprice }} 円(税込)</h4>
                    </div>    
                    <div>
                        <h6><a href="{{ action('ECfrontController@front3') }}" method="post" class="btn-left2 btn btn-primary right-button2" role="button">注文手続きへ</a></h6>
                    </div>
                {{-- カート内空スキップ着地 --}}
                @endif
            </div>
        </div>
        <div class="container">
            <div class="under-contents">
                <div class="card-contents">
                    <h2 class="text-title">Information</h2>
                    <ul class="information-list">
                        <li>2019/12/17 EC店をオープンしました。</li>
                        <li>2019/12/20 新商品を追加しました。</li>
                        <li>2020/01/20 イベントの予定です。</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    
@endsection