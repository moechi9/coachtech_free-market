@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/item.css')}}">
@endsection

@section('content')
<div class="item">
    <form class="item_inner" action="{{route('purchase.item_id',['item_id'=>$item['id']])}}" method="get" enctype="multipart/form-data">
        @csrf
        <div class="item_inner1">
            <div class="item_image">
                <img class="image" src="{{asset($item['img'])}}" alt="{{$item['img']}}">
            </div>
        </div>
        <div class="item_inner2">
            <div class="item_name">{{$item['name']}}</div>
            <div class="item_brand">{{$item['brand']}}</div>
            <div class="item_price">¥<span class="price">{{number_format($item['price'])}}</span>（税込）</div>
            <div class="item_stamps">
                <div class="favorite_mark">
                    @if($item->is_liked_by_auth_user())
                    <a href="{{ route('unlike',['item_id'=>$item['id']]) }}" class="star_like">&#9734;</a>
                    <div class="favorite_count">{{$item->favorites->count()}}</div>
                    @else
                    <a href="{{ route('like',['item_id'=>$item['id']]) }}" class="star_unlike">&#9734;</a>
                    <div class="favorite_count">{{$item->favorites->count()}}</div>
                    @endif
                </div>
                <div class="comment_mark">
                    <img class="balloon" src="{{asset('storage/comment_img/comment.png')}}" alt="コメント">
                    <div class="comment_count">1</div>
                </div>
            </div>
            <div class="item_button__purchase">
                <button class="button">購入手続きへ</button>
            </div>
            <div class="item_content__title">商品説明</div>
            <div class="item_content__inner">
                <textarea type="text" class="content" readonly>{{$item['content']}}</textarea>
            </div>
            <div class="item_information__title">商品の情報</div>
            <div class="item_category">
                <div class="category_title">カテゴリー</div>
                @foreach($item->categories as $category)
                <div class="category_inner">{{$category['name']}}</div>
                @endforeach
            </div>
            <div class="item_condition">
                <div class="condition_title">商品の状態</div>
                <div class="condition_inner">{{$item->condition->name}}</div>
            </div>
    </form>
    @foreach($item->comments as $comment)
    <div class="comment_title">コメント(1)</div>
    <div class="comment_user">
        <div class="user_image">{{$comment->user->image}}</div>
        <div class="user_name">{{$comment->user->name}}</div>
    </div>
    <div class="comment_latest">
        <input type="text" class="latest_comment" name="latest_comment" value="{{$comment->comment}}" readonly />
    </div>
    @endforeach
    <form class="item_comment" action="/comment" method="post">
        @csrf
        <div class="my-comment_title">商品へのコメント</div>
        <div class="my-comment_input">
            <input type="text" name="comment" id="comment" class="textarea" value="{{old('$comment->comment')}}">
            <input type="hidden" name="item_id" value="{{$item->id}}">
            <div class="error">
                @error('comment')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="comment_button">
            <button class="button">コメントを送信する</button>
        </div>
    </form>
</div>

</div>

@endsection