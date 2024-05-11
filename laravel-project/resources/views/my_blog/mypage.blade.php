@extends('header.header')

@section('content')

<div class="main">
    <!-- マイページ -->
    <div class="ttl">
        <h2 class="ttl-page">マイページ</h2>
    </div>
    <!-- ブックマークしたページへ遷移 -->
    <div>
        <a href="{{ route('getBookmark') }}">ブックマーク</a>
    </div>
    <!-- カテゴリ一覧ページへ遷移 -->
    <div>
        <a href="{{ route('category.index') }}">カテゴリ一覧ページへ</a>
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
            <div style="display: flex;">
                <h4 class="blog-item__category" style="color: purple;">
                    @foreach($myBlog->blog_categories as $blog_category)
                    {{ $blog_category->category->name }}
                    @endforeach
                </h4>
                <h3 class="blog-item__ttl" style="margin-left: 5%;">{{ $myBlog->title }}</h3>
            </div>
            <p class="blog-item__created">{{ $myBlog->created_at }}</p>
            <p class="blog-item__text">{{ strlen($myBlog->contents) > 15 ? substr($myBlog->contents, 0, 15) . '...' : $myBlog->contents }}</p>
            <div class="blog-item__detail" style="display: flex;">
                <div style="margin-right: 5%;">
                    <a href="{{ route('my_detail', ['id' => $myBlog->id]) }}" class="blog-item__detail-link">記事詳細へ</a>
                </div>
                <form action="{{ route('toggle', $myBlog->id) }}" method="post">
                    @method('put')
                    @csrf
                    <button type="submit">
                        {{ $myBlog->status === 0 ? '公開' : '非公開' }}
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection