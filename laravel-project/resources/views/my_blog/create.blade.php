@extends('header.header')

@section('content')

<div class="main">
    <!-- 新規作成タイトル -->
    <div class="ttl">
        <h2 class="ttl-page">新規記事</h2>
    </div>
    <!-- 記事追加フォーム -->
    <div class="blog">
        <form action="{{ route('blog.store') }}" method="post" class="blog-form">
            @csrf
            <p class="blog-form__ttl">タイトル</p>
            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <input type="text" name="title" value="{{ old('title') }}" class="blog-form__ttl-input">
            <p class="blog-form__text">内容</p>
            @error('contents')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <textarea name=" contents" cols="30" rows="10" class="blog-form__textarea">{{ old('contents') }}</textarea>
            <div class="blog-form__submit">
                <button type="submit" class="blog-form__submit-button">新規作成</button>
            </div>
        </form>
    </div>
</div>

@endsection