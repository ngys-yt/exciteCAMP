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
    <script>
        'use strict';

        const photos = @json($photos);
        let num = 0;

        function changeImg(num) {
            // id = photo の src を photos[num] に変更
            document.getElementById("photo").setAttribute("src", photos[num]);
        }

        // 一番左の写真から右ボタンを押すと左ボタンが表示される
        // 一番右の写真までいくと右ボタンが消える
        function goForward(){
            num ++;
            if(num == photos.length-1){
                document.getElementById('right').style.display = 'none';
            }else if(num == 1){
                document.getElementById('left').style.display = 'inline';
            }
            changeImg(num);
        }

        // 一番右の写真から左ボタンを押すと右ボタンが表示される
        // 一番左の写真までいくと左ボタンが消える
        function goBack(){
            num --;
            if(num == 0){
                document.getElementById('left').style.display = 'none';
            }else if(num == photos.length-2){
                document.getElementById('right').style.display = 'inline';
            }
            changeImg(num);
        }

    </script>
@endsection