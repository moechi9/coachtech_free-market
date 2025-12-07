@extends('auth/common1')
@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div>
    <div>
        <p>登録していただいたメールアドレスに認証メールを送付しました。</p>
        <p>メール認証を完了してください。</p>
    </div>
    <a href="">
        <button>認証はこちらから</button>
    </a>
    <form action="">
        <p>認証メールを再送する</p>
    </form>
</div>
@endsection