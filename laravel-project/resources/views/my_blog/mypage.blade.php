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
        @foreach($myBlogs as $myBlog)
        <div class="blog-item">
            <h3 class="blog-item__ttl">{{ $myBlog->title }}</h3>
            <p class="blog-item__created">{{ $myBlog->created_at }}</p>
            <p class="blog-item__text">{{ strlen($myBlog->contents) > 15 ? substr($myBlog->contents, 0, 15) . '...' : $myBlog->contents }}</p>
            <div class="blog-item__detail">
                <a href="{{ route('my_detail', ['id' => $myBlog->id]) }}" class="blog-item__detail-link">記事詳細へ</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection