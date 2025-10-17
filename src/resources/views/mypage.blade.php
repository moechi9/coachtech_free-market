@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}">
@endsection

@section('content')
<div class="mypage_background">
    <div class="mypage_user">
        <div class="user">
            <div class="user_name">
                @if ($user->image === null)
                <img class="user_image" src="{{asset('storage/default.png')}}" alt="デフォルト">
                @else
                <img class="user_image" src="{{$user['image']}}" alt="{{$user['image']}}">
                @endif
                <span class="user_title">{{$user['name']}}</span>
            </div>
            <a href="/mypage/edit" class="update">プロフィールを編集</a>
        </div>
    </div>
    <div class="mypage_top">
        <div class="mypage_top__button">
            <a href="{{ route('mypage',['page'=>'sell']) }}" class="mypage_top__button_sell">出品した商品</a>
            <a href="{{ route('mypage',['page'=>'buy']) }}" class="mypage_top__button_buy">購入した商品</a>
        </div>
        <div class="border"></div>
    </div>
    <div class="mypage_content">
        @foreach($items as $item)
        <div class="item-card">
            <a class="item-card__link" href="{{route('item.item_id',['item_id'=>$item['id']])}}">
                <div class="item-card__img">
                    <img class="item-card__img-item" src="{{asset($item['img'])}}" alt="{{$item['img']}}" />
                </div>
                <div class="item-card__content">{{$item['name']}}</div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection