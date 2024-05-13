@extends('header.header')

@section('content')

<div class="main">
    <!-- 対象のBlog詳細タイトル -->
    <div class="ttl">
        @if(isset($blog->blog_categories->first()->category->name))
        <h3 style="color: purple;">{{ $blog->blog_categories->first()->category->name }}</h3>
        @endif
        <h2 class="ttl-page">{{ $blog->title }}</h2>
    </div>
    <!-- 対象のBlog詳細内容 -->
    <div class="detail">
        <p class="detail-created">{{ $blog->created_at }}</p>
        <p class="detail-text">{{ $blog->contents }}</p>
        <div class="detail-top">
            <a href="{{ route('top') }}" class="detail-top__link">一覧ページへ</a>
        </div>
    </div>
    <!-- コメント追加フォーム -->
    <div class="comment">
        <h3 class="comment-q">この投稿にコメントしますか？</h3>
        <form action="{{ route('comment.store', ['id' => $blog->id]) }}" method="post" class="comment-form">
            @csrf
            <p class="comment-form__ttl">コメント名</p>
            @error('commenter_name')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <input type="text" name="commenter_name" value="{{ old('commenter_name') }}" class="comment-form__ttl-input">
            <p class="comment-form__text">内容</p>
            @error('comments')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <textarea name="comments" cols="30" rows="10" class="comment-form__textarea">{{ old('comments') }}</textarea>
            <div class="comment-form__submit">
                <button type="submit" class="comment-form__submit-button">コメント</button>
            </div>
        </form>
    </div>
    <!-- コメント一覧 -->
    <div class="list">
        <h4 class="list-ttl">コメント一覧</h4>
        <!-- foreach -->
        @foreach($comments as $comment)
        <div class="list-item">
            <p class="list-item__ttl">{{ $comment->comments }}</p>
            <p class="list-item__time">{{ $comment->created_at }}</p>
            <p class="list-item__nickname">{{ $comment->commenter_name }}</p>
        </div>
        @endforeach
    </div>
</div>

@endsection