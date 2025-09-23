@extends('auth/common1')
@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
<div class="login_background">
    <div class="login__content">
        <form action="/login" method="post" class="login__content_form">
            @csrf
            <div class="login__content_title">
                <span class="title">ログイン</span>
            </div>
            <div class="login__content_inner">
                <div class="group">
                    <div class="login__content_inner-title">
                        <span class="label">メールアドレス</span>
                    </div>
                    <div class="login__content_inner-input">
                        <input type="text" class="text" name="email" value="{{old('email')}}" />
                        <div class="error">
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="group">
                    <div class="login__content_inner-title">
                        <span class="label">パスワード</span>
                    </div>
                    <div class="login__content_inner-input">
                        <input type="text" class="text" name="password" value="{{old('password')}}" />
                        <div class="error">
                            @error('password')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="login__content_button">
                <button class="button__login">ログインする</button>
            </div>
        </form>
        <div class="login__content_register">
            <a href="/register" class="button__register-page">会員登録はこちら</a>
        </div>
    </div>
</div>
@endsection