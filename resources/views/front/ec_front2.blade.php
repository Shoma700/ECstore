@extends('layouts.ec_base_front1')

@section('content')
    <header>
        <div class="container">
            <div class="header-title-area">
                <h1 class="logo">ECフロント画面2(注文フォーム)</h1>
                <p class="text-sub">下記フォームを入力し注文してください。</p>
            </div>
        </div>
    </header>
    <div class="main">
        <div class="container">
            <div class="row">
                {{-- 左側 --}}
                <div class="left-contents mx-auto">
                    <form action="{{ action('ECfrontController@front4') }}" method="post" enctype="multipart/form-data">
                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="form-group row">
                            <label class="col-md-2" for="customer_name">氏名</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="customer_name" value="{{ old('customer_name') }}">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-md-2" for="customer_tel">電話番号</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="customer_tel" value="{{ old('customer_tel') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="customer_postal_code">郵便番号</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="customer_postal_code" value="{{ old('customer_postal_code') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="customer_address">住所</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="customer_address" value="{{ old('customer_address') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="customer_mail">メールアドレス</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="customer_mail" value="{{ old('customer_mail') }}">
                            </div>
                        </div>
                    {{ csrf_field() }}
                    <button type="submit">注文確定</button>
                    </form>
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
                    {{-- カート内空スキップ着地 --}}
                    @endif
                </div>
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