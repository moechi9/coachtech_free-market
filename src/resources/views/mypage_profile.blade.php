@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/mypage_profile.css')}}">
@endsection

@section('content')
<div class="profile_background">
    <div class="profile__content">
        <form action="/mypage/profile" class="profile__content_form" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            <div class="profile__content_title">
                <span class="title">プロフィール設定</span>
            </div>
            <div class="profile__content_inner">
                <diV class="group">
                    <div class="profile__content_inner-img">
                        <div class="form-input__img">
                            <output id="list">
                                <img class="form-input__img-item" src="{{asset('storage/default.png')}}" alt="デフォルト">
                            </output>
                        </div>
                        <label for="image" class="select">画像を選択する</label>
                        <input type="file" class="file" id="image" name="image" value="{{old('image')}}" />
                    </div>
                    <div class="error">
                        @error('image')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <diV class="group">
                    <div class="profile__content_inner-title">
                        <span class="label">ユーザー名</span>
                    </div>
                    <div class="profile__content_inner-input">
                        <input type="text" class="text" name="name" value="{{$user['name']}}" />
                        <input type="hidden" name="id" value="{{$user['id']}}">
                        <div class="error">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <diV class="group">
                    <div class="profile__content_inner-title">
                        <span class="label">郵便番号</span>
                    </div>
                    <div class="profile__content_inner-input">
                        <input type="text" class="text" name="postcode" value="{{old('postcode')}}" />
                        <div class="error">
                            @error('postcode')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <diV class="group">
                    <div class="profile__content_inner-title">
                        <span class="label">住所</span>
                    </div>
                    <div class="profile__content_inner-input">
                        <input type="text" class="text" name="address" value="{{old('address')}}" />
                        <div class="error">
                            @error('address')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <diV class="group">
                    <div class="profile__content_inner-title">
                        <span class="label">建物名</span>
                    </div>
                    <div class="profile__content_inner-input">
                        <input type="text" class="text" name="building" value="{{old('building')}}" />
                        <div class="error">
                            @error('building')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile__content_button">
                <button class="button__register">更新する</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('image').onchange = function(event) {

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