@extends('layouts.ec_base_front1')

@section('content')
    <header>
        <div class="container">
            <div class="header-title-area">
                <h1 class="logo">ECフロント画面</h1>
                <p class="text-sub">スケートボード商品を提供します。</p>
            </div>
            <ul class="header-navigation">
                <li><a href="#">デッキ</a></li>
                <li><a href="#">トラック</a></li>
                <li><a href="#">ウィール</a></li>
                <li><a href="#">ベアリング</a></li>
                <li><a href="#">メンテナンス</a></li>
                <li><a href="#">シューズ</a></li>
                <li><a href="#">その他</a></li>
            </ul>
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
                            <img src="{{ asset('/storage/app/public/b_ninja.jpg') }}" class="product-image">
                            <p class="product-name">{{ mb_substr($p_list->product_name, 0, 12) }}</p>
                            <p class="product-price">{{ $p_list->product_price }}￥</p>
                            <p><input class="num_text" type="text" name="quantity" rows="1">--数量</p>
                            <div>
                                <h6><a href="#" class="btn-left btn btn-primary" role="button">カートへ</a></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{--  --}}
                <div class="card-contents">
                    <h4 class="text-title">ページネーション</h4></h4>
                </div>
            </div>
            {{-- 右側 --}}
            <div class="right-contents">
                <div class="card-contents">
                    <h4 class="text-title">カート</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card-contents">
        <h2 class="text-title">Information</h2>
        <ul class="information-list">
            <li>2019/12/17 EC店をオープンしました。</li>
            <li>2019/12/20 新商品を追加しました。</li>
            <li>2020/01/20 イベントの予定です。</li>
        </ul>
    </div>
    
    
@endsection