@extends('header.header')

@section('content')

<div class="main">
    <!-- 新規作成タイトル -->
    <div class="ttl">
        <h2 class="ttl-page">新規記事</h2>
    </div>
    <!-- 記事追加フォーム -->
    <div class="blog">
        <form action="" method="post" class="blog-form">
            @csrf
            <p class="blog-form__ttl">タイトル</p>
            <input type="text" name="" value="" class="blog-form__ttl-input">
            <p class="blog-form__text">内容</p>
            <textarea name="" cols="30" rows="10" class="blog-form__textarea"></textarea>
            <div class="blog-form__submit">
                <button type="submit" class="blog-form__submit-button">新規作成</button>
            </div>
        </form>
    </div>
</div>

@endsection