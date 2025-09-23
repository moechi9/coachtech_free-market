@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/purchase.css')}}">
@endsection

@section('content')
<div class="purchase_background">
    <div class="purchase">
        <div class="purchase_inner1">
            <div class="item_content">
                <div class="item_image"></div>
                <div class="item_name-price">
                    <div class="name">商品名</div>
                    <div class="price">¥値段</div>
                </div>
            </div>
            <div class="border"></div>
            <div class="payment-method">
                <div class="payment-method_title">支払い方法</div>
                <div class="payment-method_inner">
                    <select name="" id="" class="select">
                        <option value="" selected hidden>選択してください</option>
                        <option value="convenience-store">コンビニ払い</option>
                        <option value="credit-card">カード支払い</option>
                    </select>
                </div>
            </div>
            <div class="border"></div>
            <div class="user_shipping-address">
                <div class="user_shipping-address_header">
                    <div class="shipping-address_title">配送先</div>
                    <a href="/purchase/address" class="shipping-address_update">変更する</a>
                </div>
                <div class="user_postcode-address">
                    <div class="postcode">〒XXX-YYYY</div>
                    <div class="address">ここには住所と建物が入ります</div>
                </div>
            </div>
            <div class="border"></div>
        </div>
        <div class="purchase_inner2">
            <div class="price_confirmed">
                <div class="price_confirmed_title">商品代金</div>
                <div class="price_confirmed_inner">¥値段</div>
            </div>
            <div class="payment-method_confirmed">
                <div class="payment-method_confirmed_title">支払い方法</div>
                <div class="payment-method_confirmed_inner">コンビニ払い</div>
            </div>
            <button>購入する</button>
        </div>
    </div>
</div>


@endsection