@extends('header.header')

@section('content')

<div class="main">
    <!-- タイトル -->
    <div class="ttl">
        <h1 class="ttl-top">カテゴリ一覧</h1>
    </div>
    <!-- リンク -->
    <div class="link">
        <a href="{{ route('category.create') }}" class="link-create">カテゴリを追加</a>
        <a href="{{ route('mypage') }}" class="link-category">マイページへ</a>
    </div>
    <!-- テーブル一覧 -->
    <table class="table" border="1" style="border-collapse: collapse;">
        <!-- テーブルタイトル -->
        <tr class="table-tr">
            <th class="table-th">カテゴリ名</th>
            <th class="table-th">作成日時</th>
            <th class="table-th">編集</th>
            <th class="table-th">削除</th>
        </tr>
        <!-- テーブル内容 -->
        @foreach ($categories as $category)
        <tr class="table-tr">
            <td class="table-td">{{ $category->name }}</td>
            <td class="table-td">{{ $category->created_at }}</td>
            <td class="table-td">
                <a href="{{ route('category.edit', $category->id) }}" class="edit-link">編集</a>
            </td>
            <td class="table-td">
                <form action="{{ route('category.destroy', $category->id) }}" class="delete" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <button class="delete-button" type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection