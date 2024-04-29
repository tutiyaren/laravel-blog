@extends('header.header')

@section('content')

<div class="main">
    <!-- ページタイトル -->
    <div class="ttl">
        <h2 class="ttl-page">Blog一覧</h2>
    </div>
    <!-- 絞り込み -->
    <form action="" method="get" class="search">
        @csrf
        <div class="search-word">
            <input type="text" name="" value="" placeholder="キーワードを入力" class="search-word__input">
        </div>
        <div class="search-sort">
            <input type="radio" name="created_at" class="search-sort__new">新しい順
            <input type="radio" name="created_at" class="search-sort__new">古い順
        </div>
        <div class="search-submit">
            <button class="search-submit__button">検索</button>
        </div>
    </form>
    
    <!-- blog一覧 -->
    <div class="blog">
        <!-- foreach -->
        <div class="blog-item">
            <h3 class="blog-item__ttl">タイトル</h3>
            <p class="blog-item__created">2024-05-02 15:48:12</p>
            <p class="blog-item__text">内容15文字まで...</p>
            <div class="blog-item__detail">
                <a href="{{ route('detail') }}" class="blog-item__detail-link">記事詳細へ</a>
            </div>
        </div>
    </div>
</div>

@endsection