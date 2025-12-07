@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/sell.css')}}">
@endsection

@section('content')
<div class="sell_background">
    <div class="sell__content">
        <form action="/sell" class="sell__content_form" enctype="multipart/form-data" method="post">
            @csrf
            <div class="profile__content_title">
                <span class="title">商品の出品</span>
            </div>
            <div class="sell__content_inner">
                <div class="group">
                    <div class="sell__content_inner-title">
                        <span class="label">商品画像</span>
                    </div>
                    <output class="image_border" id="list">
                    </output>
                    <label for="img" class="select">画像を選択する</label>
                    <input type="file" class="file" id="img" name="img" value="{{old('img')}}" />
                    <div class="error">
                        @error('img')
                        {{$message}}
                        @enderror
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
                                <input class="category" type="checkbox" name="item_category[]" value="{{$category['id']}}" id="{{$category['id']}}"><span class="category-name">{{$category['name']}}</span>
                            </label>
                            @endforeach
                        </div>
                        <div class="error">
                            @error('item_category')
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

<script>
    document.getElementById('img').onchange = function(event) {

        initializeFiles();

        var files = event.target.files;

        for (var i = 0, f; f = files[i]; i++) {
            var reader = new FileReader;
            reader.readAsDataURL(f);

            reader.onload = (function(theFile) {
                return function(e) {
                    var div = document.createElement('div');
                    div.className = 'reader_file';
                    div.innerHTML += '<img class="reader_image" src="' + e.target.result + '" />';
                    document.getElementById('list').insertBefore(div, null);
                }
            })(f);
        }
    };

    function initializeFiles() {
        document.getElementById('list').innerHTML = '';
    }
</script>

@endsection