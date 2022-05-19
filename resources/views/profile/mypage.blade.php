<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
        <script src="https://kit.fontawesome.com/6558f17102.js" crossorigin="anonymous"></script>
    </head>
    <body>
        @section('mypage')
        <div style="display: flex;">
            <div class="container">
                <div class="header-img">
                    @if (Auth::user()->cover===NULL)
                        <p>exciteCAMP</p>
                    @else
                        <img src="{{ Auth::user()->cover }}" alt="背景画像" style="width: 800px;">
                    @endif
                </div>
                <div class="icon">
                    @if ( Auth::user()->image===NULL)
                        <p><i class="fas fa-user"></i></p>
                    @else
                        <img src="{{ Auth::user()->image }}" alt="アイコン画像" style="width: 100px;">
                    @endif
                </div>
                <div class="name">
                    {{ Auth::user()->name }}
                </div>
                <div class="sns">
                    <a href="{{ Auth::user()->twitter }}">
                        <i class="fab fa-twitter-square"></i>
                    </a>
                    <a href="{{ Auth::user()->instagram }}">
                        <i class="fab fa-instagram-square"></i>
                    </a>
                    <a href="{{ Auth::user()->facebook }}">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a href="{{ Auth::user()->youtube }}">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <div class="profile">
                    {!! nl2br(Auth::user()->profile) !!}   
                    {{-- <br>(特殊文字)をエスケープさせないために !! で囲む --}}
                    {{-- <br>以外をエスケープさせるために nl2br をつける --}}
                </div>
                <div class="category">
                    {{-- カテゴリー選択ボタン --}}
                    <a href="{{ route('mypage') }}?d=all">全て</a>
                    <a href="{{ route('mypage') }}?c=CAMP">CAMP</a>
                    <a href="{{ route('mypage') }}?c=FOOD">FOOD</a>
                    <a href="{{ route('mypage') }}?c=GEAR">GEAR</a>
                </div>
                <div>
                    @php
                        if($category=request()->get('c')){
                            $posts = Auth::user()->posts()->where('category', $category)->get();
                        }elseif(request()->get('d')){
                            $posts = Auth::user()->posts;
                        }else{
                            $posts = Auth::user()->posts;
                        }
                        @endphp
                    @foreach ($posts as $post)
                    <a href="{{ route('post_detail', ['id'=>$post->id]) }}">
                        <img src="{{ $post->photo }}" alt="" style="width: 100px">
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="menu">
                <a href="{{ route('direct_message') }}">DM</a>
                <a href="{{ route('ff_list',['id' => Auth::id()]) }}?1=follow">フォロー</a>
                <a href="{{ route('ff_list',['id' => Auth::id()]) }}?2=follower">フォロワー</a>
                <a href="{{ route('contact') }}">問い合わせ</a>
                <a href="{{ route('create_profile') }}">編集</a>
                <a href="{{ route('edit_password') }}">パスワード変更</a>
                <a href="{{ route('withdrawal') }}">退会</a>
            </div>
        </div>
        @endsection
    </body>
</html>
@extends('header')