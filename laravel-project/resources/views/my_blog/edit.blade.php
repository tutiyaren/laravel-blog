@extends('header.header')

@section('content')

<div class="main">
    <!-- 記事編集フォーム -->
    <div class="blog">
        <form action="{{ route('update') }}" method="post" class="blog-form">
            @method('put')
            @csrf
            <p>カテゴリ</p>
            <select name="name" required>
                <option disabled selected value="">カテゴリを選択してください</option>
                @foreach($categories as $category)
                @if($myBlog->blog_categories->contains('category_id', $category->id))
                <option value="{{ $category->id }}" disabled selected>{{ $category->name }}</option>
                @endif
                @if(!($myBlog->blog_categories->contains('category_id', $category->id)))
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $myBlog->id }}">
            <p class="blog-form__ttl">タイトル</p>
            @error('title')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <input type="text" name="title" value="{{ $myBlog->title }}" class="blog-form__ttl-input">
            <p class="blog-form__text">内容</p>
            @error('contents')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <textarea name="contents" cols="30" rows="10" class="blog-form__textarea">{{ $myBlog->contents }}</textarea>
            <div class="blog-form__submit">
                <button type="submit" class="blog-form__submit-button">編集</button>
            </div>
        </form>
    </div>
</div>

@endsection