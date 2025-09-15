@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/mypage_profile.css')}}">
@endsection

@section('content')
<div class="profile_background">
    <div class="profile__content">
        <form action="" class="profile__content_form" enctype="multipart/form-data">
            @csrf
            <div class="profile__content_title">
                <span class="title">プロフィール設定</span>
            </div>
            <div class="profile__content_inner">
                <diV class="group">
                    <div class="profile__content_inner-input">
                        <label for="image" class="select">画像を選択する</label>
                        <input type="file" class="file" id="image" name="image" value="{{old('image')}}" />
                    </div>
                </div>
                <diV class="group">
                    <div class="profile__content_inner-title">
                        <span class="label">ユーザー名</span>
                    </div>
                    <div class="profile__content_inner-input">
                        <input type="text" class="text" name="name" value="{{old('name')}}" />
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
                        <input type="text" class="text" name="post-code" value="{{old('post-code')}}" />
                        <div class="error">
                            @error('post-code')
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

@endsection