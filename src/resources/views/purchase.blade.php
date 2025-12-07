@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/purchase.css')}}">
@endsection

@section('content')
<div class="purchase_background">
    <form class="purchase" action="{{route('sale.item_id',['item_id'=>$item['id']])}}" method="post">
        @csrf
        <div class="purchase_inner1">
            <div class="item_content">
                <img class="item_image" src="{{asset($item['img'])}}" alt="{{$item['img']}}">
                <div class="item_name-price">
                    <div class="name">{{$item['name']}}</div>
                    <div class="price">¥{{number_format($item['price'])}}</div>
                </div>
            </div>
            <div class="border"></div>
            <div class="payment-method">
                <div class="payment-method_title">支払い方法</div>
                <div class="payment-method_inner">
                    <select name="method" id="method" class="select">
                        <option value="" selected hidden>選択してください</option>
                        <option value="コンビニ払い">コンビニ払い</option>
                        <option value="カード支払い">カード支払い</option>
                    </select>
                </div>
                <div class="error">
                    @error('method')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="border"></div>
            <div class="user_shipping-address">
                <div class="user_shipping-address_header">
                    <div class="shipping-address_title">配送先</div>
                    <a href="{{route('purchase.address.item_id',['item_id'=>$item['id']])}}" class="shipping-address_update">変更する</a>
                </div>
                <div class="user_postcode-address">
                    <input type="text" class="postcode" name="address" value="〒{{$user->postcode}}" readonly />
                    <input type="text" class="address" name="address" value="{{$user->address}}{{$user->building}}" readonly />
                </div>
                <div class="error">
                    @error('address')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="border"></div>
        </div>
        <div class="purchase_inner2">
            <div class="price_confirmed">
                <div class="price_confirmed_title">商品代金</div>
                <div class="price_confirmed_inner">¥{{number_format($item['price'])}}</div>
            </div>
            <div class="payment-method_confirmed">
                <div class="payment-method_confirmed_title">支払い方法</div>
                <div class="payment-method_confirmed_inner" id="method_display"></div>
            </div>
            <button class="purchase_button">購入する</button>
        </div>
    </form>
</div>

<script>
    const itemSelect = document.getElementById('method');
    const displayArea = document.getElementById('method_display');

    itemSelect.addEventListener('change', function() {
        const selectedValue = this.value;

        if (selectedValue) {
            displayArea.textContent = selectedValue;
        } else {
            displayArea.textContent = '';
        }
    });
</script>


@endsection