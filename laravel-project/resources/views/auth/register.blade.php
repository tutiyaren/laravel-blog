<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>

    <main class="main">
        <div class="main-inner">
            <!-- タイトル -->
            <div class="ttl">
                <h1 class="ttl-top">
                    会員登録
                </h1>
            </div>

            <!-- 会員登録フォーム -->
            <form action="" method="post" class="form">
                @csrf
                <!-- Name -->
                <div class="form-item">
                    <input type="text" class="input" name="name" placeholder="UserName" value="">
                </div>
                <!-- Email -->
                <div class="form-item">
                    <input type="email" class="input" name="email" placeholder="Email" value="">
                </div>
                <!-- PS -->
                <div class="form-item">
                    <input type="password" class="input" name="password" placeholder="Password" value="">
                </div>
                <!-- PS確認 -->
                <div class="form-item">
                    <input type="password" class="input" name="passwrd_confirm" placeholder="Password確認用" value="">
                </div>
                <!-- 作成ボタン -->
                <div class="form-item">
                    <button type="submit" class="button">アカウント作成</button>
                </div>
            </form>

            <!-- ログイン画面へリンク -->
            <div class="link">
                <a href="{{ route('login') }}" class="link-login">ログイン画面へ</a>
            </div>

        </div>
    </main>

</body>

</html>