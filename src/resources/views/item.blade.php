@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/item.css')}}">
@endsection

@section('content')
<div class="item">
    <form class="item_inner" action="/purchase" method="get" enctype="multipart/form-data">
        @csrf
        <div class="item_inner1">
            <div class="item_image"></div>
        </div>
        <div class="item_inner2">
            <div class="item_name">商品名がここに入る</div>
            <div class="item_brand">ブランド名</div>
            <div class="item_price">¥値段（税込）</div>
            <div class="item_stamps"></div>
            <div class="item_button__purchase">
                <button class="button">購入手続きへ</button>
            </div>
            <div class="item_content__title">商品説明</div>
            <div class="item_content__inner"></div>
            <div class="item_information__title">商品の情報</div>
            <div class="item_category">
                <div class="category_title"></div>
                <div class="category_inner"></div>
            </div>
            <div class="item_condition">
                <div class="condition_title"></div>
                <div class="condition_inner"></div>
            </div>
            <form class="item_comment"></form>
        </div>
    </form>
</div>

@endsection