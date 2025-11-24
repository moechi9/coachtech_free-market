@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="index_background">
    <div class="index_top">
        <div class="index_top__button">
            <a href="/" class="{{$request->query('tab') === 'mylist'?'index_top__button_recs':'index_top__button_selected1'}}">おすすめ</a>
            <a href="{{route('index',['tab'=>'mylist'])}}" class="{{$request->query('tab') === 'mylist'?'index_top__button_selected2':'index_top__button_my-list'}}">マイリスト</a>
        </div>
        <div class="border"></div>
    </div>
    <div class="index_content">

        @if(session('search_results'))
        @foreach($items as $item)
        <div class="item-card">
            <a class="item-card__link" href="{{route('item.item_id',['item_id'=>$item['id']])}}">
                <div class="item-card__img">
                    <img class="item-card__img-item" src="{{asset($item['img'])}}" alt="{{$item['img']}}" />
                </div>
                <div class="item-card__content">{{$item['name']}}</div>
                @if($item->sale)
                <div class="item-card__sold">sold</div>
                @endif
            </a>
        </div>
        @endforeach
        @else
        @foreach($items as $item)
        <div class="item-card">
            <a class="item-card__link" href="{{route('item.item_id',['item_id'=>$item['id']])}}">
                <div class="item-card__img">
                    <img class="item-card__img-item" src="{{asset($item['img'])}}" alt="{{$item['img']}}" />
                </div>
                <div class="item-card__content">{{$item['name']}}</div>
                @if($item->sale)
                <div class="item-card__sold">sold</div>
                @endif
            </a>
        </div>
        @endforeach
        @endif

    </div>
</div>

@endsection