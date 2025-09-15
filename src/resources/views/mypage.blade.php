@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}">
@endsection

@section('content')
<div class="mypage_background">
    <div class="mypage_user">
        <div class="user">
            <div class="user_name">
            <img class="user_image" src="" alt="">
            <span class="user_title">ユーザー名</span>
            </div>
            <a href="/mypage/profile" class="update">プロフィールを編集</a>
        </div>
    </div>
    <div class="mypage_top">
        <div class="mypage_top__button">
            <form action="" class="form">
                @csrf
                <button class="mypage_top__button_sell">出品した商品</button>
            </form>
            <form action="" class="form">
                @csrf
                <button class="mypage_top__button_buy">購入した商品</button>
            </form>
        </div>
        <div class="border"></div>
    </div>
    <div class="mypage_content">

        <div class="item-card">
            <a class="item-card__link" href="">
                <div class="item-card__img">
                    <img class="item-card__img-item" src="" alt="" />
                </div>
                <div class="item-card__content">商品名</div>
            </a>
        </div>

    </div>
</div>
@endsection