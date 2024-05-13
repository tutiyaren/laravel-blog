@extends('header.header')

@section('content')

<div class="main">
    <!-- 対象のマイBlog詳細タイトル -->
    <div class="ttl">
        @if(isset($myBlog->blog_categories->first()->category->name))
        <h3 style="color: purple;">{{ $myBlog->blog_categories->first()->category->name }}</h3>
        @endif
        <h2 class="ttl-page">{{ $myBlog->title }}</h2>
    </div>
    <!-- 対象のマイBlog詳細内容 -->
    <div class="detail">
        <p class="detail-created">{{ $myBlog->created_at }}</p>
        <p class="detail-text">{{ $myBlog->contents }}</p>
        <div class="detail-edit">
            <a href="{{ route('edit', ['id' => $myBlog->id]) }}" class="detail-edit__link">編集</a>
        </div>
        <form action="{{ route('destroy') }}" method="post" class="detail-delete">
            @method('delete')
            @csrf
            <input type="hidden" name="id" value="{{ $myBlog->id }}">
            <button type="submit" class="detail-delete button">削除</button>
        </form>
        <div class="detail-top">
            <a href="{{ route('mypage') }}" class="detail-top__link">マイページへ</a>
        </div>
    </div>
</div>

@endsection