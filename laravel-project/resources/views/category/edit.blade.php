@extends('header.header')

@section('content')

<div class="main">
    <!-- ページタイトル -->
    <div class="ttl">
        <h1 class="ttl-top">編集</h1>
    </div>
    <!-- 編集フォーム -->
    <form action="{{ route('category.update', $category->id) }}" method="post" class="form">
        @method('PUT')
        @csrf
        <div class="form-ttl">
            <label for="title" class="category-ttl">カテゴリ名</label>
            <input type="text" name="name" id="title" placeholder="買い物" class="input-ttl" value="{{ $category->name }}">
            @error('title')
            <p class="error">{{ $errors->first('name') }}</p>
            @enderror
        </div>
        <div class="submit">
            <button type="submit" class="submit-button">更新</button>
        </div>
    </form>
</div>

@endsection