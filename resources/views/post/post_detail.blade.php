@extends('header')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/post_detail.css') }}">
@endsection

@section('body')
    <div class="contents">
        <h1>投稿詳細</h1>
        <div>
            @if ($user->id == Auth::id())
            <a href="{{ route('mypage') }}">{{ $user->name }}</a>
            @else
            <a href="{{ route('profile_detail',['id' => $user->id]) }}">{{ $user->name }}</a>
            @endif
        </div>
        <div class="post">
            <a id="left" style="display: none" href="#" class="arrow arrow-left" onclick="goBack()"></a>
            <img id="photo" src="{{ $photos[0] }}" alt="" style="width: 300px">
        @if(isset($photos[1])) {{-- 画像２枚目の存在確認 --}}
            <a id="right" style="display: inline" href="#" class="arrow arrow-right" onclick="goForward()"></a>
        @endif
        </div>
        @if ($post->category == 'CAMP')
            <div>カテゴリー：{{ $post->category }}</div>
            <div>エリア：{{ $post->kind_1 }}</div>
            <div>キャンプ場：{{ $post->kind_2 }}</div>
            <div>タイトル：{{ $post->title }}</div>
            <div>内容：{{ $post->content }}</div>
        @elseif ($post->category == 'FOOD')
            <div>カテゴリー：{{ $post->category }}</div>
            <div>料理名：{{ $post->kind_1 }}</div>
            <div>使用アイテム：{{ $post->kind_2 }}</div>
            <div>タイトル：{{ $post->title }}</div>
            <div>内容：{{ $post->content }}</div>
        @elseif ($post->category == 'GEAR')
            <div>カテゴリー：{{ $post->category }}</div>
            <div>ブランド名：{{ $post->kind_1 }}</div>
            <div>アイテム名：{{ $post->kind_2 }}</div>
            <div>タイトル：{{ $post->title }}</div>
            <div>内容：{{ $post->content }}</div>
        @endif
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
    <script>
        const photos = @json($photos);
    </script>
    <script src="{{ asset('/js/post_detail.js') }}"></script>
@endsection