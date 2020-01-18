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
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-md-2" for="name">氏名</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-md-2" for="tel">電話番号</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="tel" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="postal_code">郵便番号</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="postal_code" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="address">住所</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="address" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="mail">メールアドレス</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="mail" value="">
                            </div>
                        </div>
                    {{ csrf_field() }}
                    </form>
                </div>
                {{-- 右側 --}}
                <div class="right-contents">
                    <div class="card-contents">
                        <h4 class="text-title">カート</h4>
                    </div>
                    <div>
                        <h6><a href="#" class="btn-left2 btn btn-primary" role="button">商品選択へ</a></h6>
                        
                    </div>
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