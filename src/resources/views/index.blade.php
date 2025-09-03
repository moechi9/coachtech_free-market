@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div>
    <div>
        <div>
            <form action="">
                @csrf
                <button>おすすめ</button>
            </form>
            <form action="">
                @csrf
                <button>マイリスト</button>
            </form>
        </div>
        <div class="border"></div>
    </div>
    <div>
        @foreach($items as $item)
        <div class="item-card">
            <a class="item-card__link" href="">
                <div class="item-card__img">
                    <img class="item-card__img-item" src="{{asset($item['img'])}}" alt="{{$item['img']}}" />
                </div>
                <div class="item-card__content">{{$product['name']}}</div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection