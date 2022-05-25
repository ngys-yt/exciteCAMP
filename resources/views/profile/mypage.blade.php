@extends('header')

@section('head')
    <link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
    <script src="https://kit.fontawesome.com/6558f17102.js" crossorigin="anonymous"></script>
@endsection

@section('body')
    <div class="main">
        <div>
            @if (Auth::user()->cover===NULL)
            <div class="header-img-null">
                <p>exciteCAMP</p>
            </div>
            @else
            <div class="header-img">
                <img src="{{ Auth::user()->cover }}" alt="背景画像">
            </div>
            @endif
        </div>
        <div>
            @if ( Auth::user()->image===NULL )
            <div class="icon-null">
                <p><i class="fas fa-user"></i></p>
            </div>
            @else
            <div class="icon-img">
                <img src="{{ Auth::user()->image }}" alt="アイコン画像">
            </div>
            @endif
        </div>
        <div class="name">
            {{ Auth::user()->name }}
        </div>
        @if (
                Auth::user()->twitter===!NULL ||
                Auth::user()->instagram===!NULL ||
                Auth::user()->facebook===!NULL ||
                Auth::user()->youtube===!NULL
            )
            <div class="sns">
                @if (Auth::user()->twitter===!NULL)
                    <a href="{{ Auth::user()->twitter }}">
                        <i class="twitter fab fa-twitter-square"></i>
                    </a>
                @endif
                @if (Auth::user()->instagram===!NULL)
                    <a href="{{ Auth::user()->instagram }}">
                        <i class="instagram fab fa-instagram-square"></i>
                    </a>
                @endif
                @if (Auth::user()->facebook===!NULL)
                    <a href="{{ Auth::user()->facebook }}">
                        <i class="facebook fab fa-facebook-square"></i>
                    </a>
                @endif
                @if (Auth::user()->youtube===!NULL)
                    <a href="{{ Auth::user()->youtube }}">
                        <i class="youtube fab fa-youtube"></i>
                    </a>
                @endif
            </div>
        @else
            <div class="null">
                {{-- 空白 --}}
            </div>
        @endif
    </div>
    <div class="contents">
        <div class="side-menu">
            <a href="{{ route('direct_message') }}">DM</a>
            <a href="{{ route('ff_list',['id' => Auth::id()]) }}?1=follow">フォロー：{{ $follow_count }}人</a>
            <a href="{{ route('ff_list',['id' => Auth::id()]) }}?2=follower">フォロワー：{{ $follower_count }}人</a>
            <a href="{{ route('contact') }}">問い合わせ</a>
            <a href="{{ route('create_profile') }}">編集</a>
            <a href="{{ route('edit_password') }}">パスワード変更</a>
            <a href="{{ route('withdrawal') }}">退会</a>
        </div>
        <div class="contents-body">
            <div class="profile">
                {!! nl2br(Auth::user()->profile) !!}   
                {{-- <br>(特殊文字)をエスケープさせないために !! で囲む --}}
                {{-- <br>以外をエスケープさせるために nl2br をつける --}}
            </div>
            <div class="category">
                {{-- カテゴリー選択ボタン --}}
                <a href="{{ route('mypage') }}?d=all">ALL</a>
                <a href="{{ route('mypage') }}?c=CAMP">CAMP</a>
                <a href="{{ route('mypage') }}?c=FOOD">FOOD</a>
                <a href="{{ route('mypage') }}?c=GEAR">GEAR</a>
            </div>
            <div class="post-img">
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
                    <img src="{{ $post->photo }}" alt="投稿画像">
                </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection