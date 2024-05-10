@extends('header.header')

@section('content')

<div class="main">
    <!-- マイページ -->
    <div class="ttl">
        <h2 class="ttl-page">ブックマークページ</h2>
    </div>
    <!-- マイページへ遷移 -->
    <div>
        <a href="{{ route('mypage') }}">マイページへ</a>
    </div>
    <!-- マイbookmark一覧 -->
    <div class="blog">
        <!-- foreach -->
        @foreach($bookmarks as $bookmark)
        <div class="blog-item">
            <h3 class="blog-item__ttl">{{ $bookmark->title }}</h3>
            <p class="blog-item__created">{{ $bookmark->created_at }}</p>
            <p class="blog-item__text">{{ strlen($bookmark->contents) > 15 ? substr($bookmark->contents, 0, 15) . '...' : $bookmark->contents }}</p>
            <div class="blog-item__detail">
                <form action="{{ route('bookmark', $bookmark->id) }}" method="post">
                    @csrf
                    <button type="submit" style="border: none; background-color: white;">
                        @if ($bookmarkExists[$bookmark->id])
                        <i class="fa-solid fa-bookmark" style="color: blue;"></i>
                        @endif
                        @if (!($bookmarkExists[$bookmark->id]))
                        <i class="fa-solid fa-bookmark" style="color: gray;"></i>
                        @endif
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection