@extends('header.header')

@section('content')

<div class="main">
    <!-- ページタイトル -->
    <div class="ttl">
        <h2 class="ttl-page">Blog一覧</h2>
    </div>
    <!-- 絞り込み -->
    <form method="get" class="search">
        @csrf
        <div class="search-word">
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="キーワードを入力" class="search-word__input">
        </div>
        <div class="search-sort">
            <input type="radio" name="sort" value="new" class="search-sort__new">新しい順
            <input type="radio" name="sort" value="old" class="search-sort__new">古い順
        </div>
        <div class="search-submit">
            <button type="submit" class="search-submit__button">検索</button>
        </div>
    </form>

    <!-- blog一覧 -->
    <div class="blog">
        <!-- foreach -->
        @foreach($blogs as $blog)
        <div class="blog-item">
            <h3 class="blog-item__ttl">{{ $blog->title }}</h3>
            <p class="blog-item__created">{{ $blog->created_at }}</p>
            <p class="blog-item__text">{{ strlen($blog->contents) > 15 ? substr($blog->contents, 0, 15) . '...' : $blog->contents }}</p>
            <div class="blog-item__detail">
                <a href="{{ route('detail', $blog->id) }}" class="blog-item__detail-link">記事詳細へ</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection