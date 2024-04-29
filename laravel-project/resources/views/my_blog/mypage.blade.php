@extends('header.header')

@section('content')

<div class="main">
    <!-- マイページ -->
    <div class="ttl">
        <h2 class="ttl-page">マイページ</h2>
    </div>
    <!-- createへ遷移 -->
    <div class="create">
        <a href="{{ route('create') }}" class="create-link">新規作成</a>
    </div>
    <!-- マイblog一覧 -->
    <div class="blog">
        <!-- foreach -->
        <div class="blog-item">
            <h3 class="blog-item__ttl">タイトル</h3>
            <p class="blog-item__created">2024-05-02 15:48:12</p>
            <p class="blog-item__text">内容15文字まで...</p>
            <div class="blog-item__detail">
                <a href="{{ route('my_detail') }}" class="blog-item__detail-link">記事詳細へ</a>
            </div>
        </div>
    </div>
</div>

@endsection