<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
    @section('camp_list')
        <div class="mx-auto" style="width: 100%">
            <h1>投稿詳細</h1>
            <div>
                @if ($user->id == Auth::id())
                <a href="{{ route('mypage') }}">{{ $user->name }}</a>
                @else
                <a href="{{ route('profile_detail',['id' => $user->id]) }}">{{ $user->name }}</a>
                @endif
            </div>
            <div><img src="{{ $post->photo }}" alt="" style="width: 300px"></div>
            <div>カテゴリー：{{ $post->category }}</div>
            <div>料理名：{{ $post->kind_1 }}</div>
            <div>使用アイテム：{{ $post->kind_2 }}</div>
            <div>タイトル：{{ $post->title }}</div>
            <div>内容：{{ $post->content }}</div>
            <div>
                
                {{-- いいね:{{ $i }}件 --}}
                {{-- 自分のページには表示しない、いいね件数実装する --}}
                @if (!($user->id == Auth::id()))
                    @if($like)
                        <form action="{{ route('like') }}" name="like" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <span class="heart" onclick="document.like.submit()">
                                <i class="fas fa-heart" id="like-{{ $post->id }}"></i>
                            </span>
                        </form>
                    @else
                        <form action="{{ route('like') }}" name="like" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <span class="heart" onclick="document.like.submit()">
                                <i class="far fa-heart" id="like-{{ $post->id }}"></i>
                            </span>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    @endsection
    </body>
</html>
@extends('header')


