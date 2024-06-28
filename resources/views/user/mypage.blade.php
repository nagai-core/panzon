<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/mypage.css')
    @vite('resources/css/app.css')
    @vite('resources/css/header.css')
    @vite('resources/css/index.css')
    @vite('resources/css/footer.css')

    <title>マイページ</title>
</head>
<body>
    <x-header />
    <main>
        <h1>マイページ</h1>
        <div class="user-info">
            <p>ようこそ、<span class="username">{{ Auth::user()->username ?? Auth::user()->name }}</span> さん</p>
        </div>

        <div class="links">
            <a href="{{ route('purchaseHistory.index') }}" class="link-box">
                <i class="fas fa-history"></i>
                <span>購入履歴</span>
            </a>
            <a href="{{ route('favorite.index') }}" class="link-box">
                <i class="fas fa-heart"></i>
                <span>お気に入り<br>一覧</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="link-box">
                <i class="fas fa-user-edit"></i>
                <span>プロフィール<br>編集</span>
            </a>
        </div>
    </main>
    <x-footer />
</body>
</html>
