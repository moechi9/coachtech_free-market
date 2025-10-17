<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>free-market</title>
    <link rel="stylesheet" href="{{ asset('css/common2.css') }}">
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    @yield('css')
</head>

<body class="body">
    <header class="header">
        <a href="/" class="header-title">
            <img class="header-title__icon" src="{{asset('storage/icon.png')}}">
        </a>
        <div class="header-search">
            <form class="header-search__form" action="/search" method="post">
                @csrf
                <input class="header-search__form_item" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="なにをお探しですか？">
            </form>
        </div>
        <div class="header-button">
            <form class="header-button__item" action="/logout" method="post">
                @csrf
                <button class="header-button__item_logout">ログアウト</button>
            </form>
            <form class="header-button__item" action="/mypage" method="get">
                @csrf
                <button class="header-button__item_mypage">マイページ</button>
            </form>
            <form class="header-button__item" action="/sell" method="get">
                @csrf
                <button class="header-button__item_sell">出品</button>
            </form>
        </div>
    </header>
    <main>
        <div class="content">
            @yield('content')
        </div>
    </main>
</body>

</html>