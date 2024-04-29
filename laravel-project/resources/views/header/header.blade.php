<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
</head>

<body>

    <header class="header">
        <div class="header-inner">
            <div class="left">
                <h1 class="left-ttl">
                    Blogアプリ
                </h1>
            </div>
            <div class="right">
                <div class="right-home">
                    <a href="{{ route('top') }}" class="home">ホーム</a>
                </div>
                <div class="right-mypage">
                    <a href="{{ route('mypage') }}" class="mypage">マイページ</a>
                </div>
                <form action="{{ route('logout') }}" method="post" class="right-logout">
                    @csrf
                    <button type="submit" class="right-logout__button">ログアウト</button>
                </form>
            </div>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

</body>

</html>