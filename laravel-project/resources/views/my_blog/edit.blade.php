@extends('header.header')

@section('content')

<div class="main">
    <!-- 記事編集フォーム -->
    <div class="blog">
        <form action="" method="post" class="blog-form">
            @csrf
            <p class="blog-form__ttl">タイトル</p>
            <input type="text" name="" value="" class="blog-form__ttl-input">
            <p class="blog-form__text">内容</p>
            <textarea name="" cols="30" rows="10" class="blog-form__textarea"></textarea>
            <div class="blog-form__submit">
                <button type="submit" class="blog-form__submit-button">編集</button>
            </div>
        </form>
    </div>
</div>

@endsection