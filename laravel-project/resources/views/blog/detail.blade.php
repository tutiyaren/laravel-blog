@extends('header.header')

@section('content')

<div class="main">
    <!-- 対象のBlog詳細タイトル -->
    <div class="ttl">
        <h2 class="ttl-page">対象タイトル</h2>
    </div>
    <!-- 対象のBlog詳細内容 -->
    <div class="detail">
        <p class="detail-created">2015-12-12 17:47:52</p>
        <p class="detail-text">内容すべて表示</p>
        <div class="detail-top">
            <a href="{{ route('top') }}" class="detail-top__link">一覧ページへ</a>
        </div>
    </div>
    <!-- コメント追加フォーム -->
    <div class="comment">
        <h3 class="comment-q">この投稿にコメントしますか？</h3>
        <form action="" method="post" class="comment-form">
            @csrf
            <p class="comment-form__ttl">コメント名</p>
            <input type="text" name="" value="" class="comment-form__ttl-input">
            <p class="comment-form__text">内容</p>
            <textarea name="" cols="30" rows="10" class="comment-form__textarea"></textarea>
            <div class="comment-form__submit">
                <button type="submit" class="comment-form__submit-button">コメント</button>
            </div>
        </form>
    </div>
    <!-- コメント一覧 -->
    <div class="list">
        <h4 class="list-ttl">コメント一覧</h4>
        <!-- foreach -->
        <div class="list-item">
            <p class="list-item__ttl">コメント内容</p>
            <p class="list-item__time">2016-11-23 12:43:52</p>
            <p class="list-item__nickname">コメント名</p>
        </div>
    </div>
</div>

@endsection