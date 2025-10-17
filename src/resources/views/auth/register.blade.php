@extends('auth/common1')
@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div class="register_background">
    <div class="register__content">
        <form action="/register" method="post" class="register__content_form">
            @csrf
            <div class="register__content_title">
                <span class="title">会員登録</span>
            </div>
            <div class="register__content_inner">
                <diV class="group">
                    <div class="register__content_inner-title">
                        <span class="label">ユーザー名</span>
                    </div>
                    <div class="register__content_inner-input">
                        <input type="text" class="text" name="name" value="{{old('name')}}" />
                        <div class="error">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <diV class="group">
                    <div class="register__content_inner-title">
                        <span class="label">メールアドレス</span>
                    </div>
                    <div class="register__content_inner-input">
                        <input type="text" class="text" name="email" value="{{old('email')}}" />
                        <div class="error">
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <diV class="group">
                    <div class="register__content_inner-title">
                        <span class="label">パスワード</span>
                    </div>
                    <div class="register__content_inner-input">
                        <input type="password" class="text" name="password" value="{{old('password')}}" />
                        <div class="error">
                            @error('password')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <diV class="group">
                    <div class="register__content_inner-title">
                        <span class="label">確認用パスワード</span>
                    </div>
                    <div class="register__content_inner-input">
                        <input type="password" class="text" name="password_confirmation" value="{{old('password_confirmation')}}" />
                        <div class="error">
                            @error('password')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="register__content_button">
                <button class="button__register">登録する</button>
            </div>
        </form>
        <div class="register__content_login">
            <a href="/login" class="button__login-page">ログインはこちら</a>
        </div>
    </div>
</div>
@endsection