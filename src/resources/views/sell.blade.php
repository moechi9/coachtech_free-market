@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/sell.css')}}">
@endsection

@section('content')
<div class="sell_background">
    <div class="sell__content">
        <form action="" class="sell__content_form" enctype="multipart/form-data">
            @csrf
            <div class="profile__content_title">
                <span class="title">商品の出品</span>
            </div>
            <div class="sell__content_inner">
                <div class="group">
                    <div class="sell__content_inner-title">
                        <span class="label">商品画像</span>
                    </div>
                    <div class="image_border">
                        <label for="image" class="select">画像を選択する</label>
                        <input type="file" class="file" id="image" name="image" value="{{old('image')}}" />
                    </div>
                </div>
                <div class="group">
                    <div class="sell__content_sub-title">
                        <span class="sub-title">商品の詳細</span>
                    </div>
                    <div class="border"></div>
                </div>
                <div class="group">
                    <div class="sell__content_inner-title">
                        <span class="label">カテゴリー</span>
                        <div class="checkbox">
                            @foreach($categories as $category)
                            <label class="category__item" for="{{$category['id']}}">
                                <input class="category" type="checkbox" name="category" value="{{$category['id']}}" id="{{$category['id']}}"><span class="category-name">{{$category['name']}}</span>
                            </label>
                            @endforeach
                        </div>
                        <div class="error">
                            @error('season')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="group">
                    <div class="sell__content_inner-title">
                        <span class="label">商品の状態</span>
                    </div>
                    <div class="sell__content_inner-input">
                        <select class="text" name="condition" value="{{old('condition')}}">
                            @foreach($conditions as $condition)
                            <option value="" selected hidden>選択してください</option>
                            <option value="{{$condition['id']}}">{{$condition['name']}}</option>
                            @endforeach
                        </select>
                        <div class="error">
                            @error('condition')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="group">
                    <div class="sell__content_sub-title">
                        <span class="sub-title">商品名と説明</span>
                    </div>
                    <div class="border"></div>
                </div>
                <div class="group">
                    <div class="sell__content_inner-title">
                        <span class="label">商品名</span>
                    </div>
                    <div class="sell__content_inner-input">
                        <input type="text" class="text" name="name" value="{{old('name')}}" />
                        <div class="error">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="group">
                    <div class="sell__content_inner-title">
                        <span class="label">ブランド名</span>
                    </div>
                    <div class="sell__content_inner-input">
                        <input type="text" class="text" name="brand" value="{{old('brand')}}" />
                    </div>
                </div>
                <div class="group">
                    <div class="sell__content_inner-title">
                        <span class="label">商品の説明</span>
                    </div>
                    <div class="sell__content_inner-input">
                        <textarea name="content" id="content" class="textarea"></textarea>
                        <div class="error">
                            @error('content')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="group">
                    <div class="sell__content_inner-title">
                        <span class="label">販売価格</span>
                    </div>
                    <div class="sell__content_inner-input">
                        <input type="text" class="text" name="price" value="{{old('price')}}" placeholder="¥" />
                        <div class="error">
                            @error('price')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="sell__content_button">
                <button class="button__register">出品する</button>
            </div>
        </form>
    </div>
</div>

@endsection