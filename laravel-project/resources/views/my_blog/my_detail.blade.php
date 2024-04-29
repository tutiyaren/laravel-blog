@extends('header.header')

@section('content')

<div class="main">
    <!-- 対象のマイBlog詳細タイトル -->
    <div class="ttl">
        <h2 class="ttl-page">対象タイトル</h2>
    </div>
    <!-- 対象のマイBlog詳細内容 -->
    <div class="detail">
        <p class="detail-created">2015-12-12 17:47:52</p>
        <p class="detail-text">内容すべて表示</p>
        <div class="detail-edit">
            <a href="{{ route('edit') }}" class="detail-edit__link">編集</a>
        </div>
        <form action="" method="post" class="detail-delete">
            @method('delete')
            @csrf
            <button type="submit" class="detail-delete button">削除</button>
        </form>
        <div class="detail-top">
            <a href="{{ route('mypage') }}" class="detail-top__link">マイページへ</a>
        </div>
    </div>
</div>

@endsection