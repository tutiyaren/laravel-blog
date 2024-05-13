@extends('header.header')

@section('content')

<div class="main">
    <!-- ページタイトル -->
    <div class="ttl">
        <h1 class="ttl-top">カテゴリ登録</h1>
    </div>
    <!-- 作成フォーム -->
    <form action="{{ route('category.store') }}" method="post" class="form">
        @csrf
        <div class="form-ttl">
            <label for="title" class="category-ttl">カテゴリ名</label>
            <input type="text" name="name" id="title" placeholder="家事" class="input-ttl" value="{{ old('name') }}">
            @error('title')
            <p class="error">{{ $errors->first('name') }}</p>
            @enderror
        </div>
        <div class="submit">
            <button type="submit" class="submit-button">送信</button>
        </div>
    </form>
</div>

@endsection