<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>free-market</title>
    <link rel="stylesheet" href="{{ asset('css/common1.css') }}">
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header-title">
            <img class="header-title__icon" src="{{asset('storage/icon.png')}}">
        </div>
    </header>
    <main>
        <div class="content">
            @yield('content')
        </div>
    </main>
</body>

</html>