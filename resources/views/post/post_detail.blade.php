@extends('header')
@section('camp_list')
<div class="mx-auto" style="width: 100%">
    <h1>投稿詳細</h1>
    <p>
        <a href="{{ route('profile_detail') }}">{{ $name }}</a>
    </p>
    <p><img src="{{ $post->photo }}" alt="" style="width: 300px"></p>
    <p>カテゴリー：{{ $post->category }}</p>
    <p>料理名：{{ $post->kind_1 }}</p>
    <p>使用アイテム：{{ $post->kind_2 }}</p>
    <p>タイトル：{{ $post->title }}</p>
    <p>内容：{{ $post->content }}</p>
</div>
@endsection



