@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="index_background">
    <div class="index_top">
        <div class="index_top__button">
            <form action="" class="form">
                @csrf
                <button class="index_top__button_recs">おすすめ</button>
            </form>
            <form action="" class="form">
                @csrf
                <button class="index_top__button_my-list">マイリスト</button>
            </form>
        </div>
        <div class="border"></div>
    </div>
    <div class="index_content">

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