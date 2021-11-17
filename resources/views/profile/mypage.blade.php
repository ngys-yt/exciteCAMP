@extends('header')
@section('mypage')
<div>
    <div class="container">
        <h1>プロフィール画面</h1>
        <div>
            背景<img src="{{ Auth::user()->cover }}" alt="" style="width: 100px;">
        </div>
        <div>
            画像<img src="{{ Auth::user()->image }}" alt="" style="width: 100px;">
        </div>
        <div>
            名前:{{ Auth::user()->name }}
        </div>
        <div>
            自己紹介<br>
            {!! nl2br(Auth::user()->profile) !!}   
            {{-- <br>(特殊文字)をエスケープさせないために !! で囲む --}}
            {{-- <br>以外をエスケープさせるために nl2br をつける --}}
        </div>
        <div class="item">
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
        <div>
            <a href="{{ route('direct_message') }}">DM</a>
            <a href="{{ route('ff_list',['id' => Auth::id()]) }}?1=follow">フォロー</a>
            <a href="{{ route('ff_list',['id' => Auth::id()]) }}?2=follower">フォロワー</a>
            <a href="{{ route('contact') }}">問い合わせ</a>
            <a href="{{ route('create_profile') }}">編集</a>
            <a href="{{ route('edit_password') }}">パスワード変更</a>
            <a href="{{ route('withdrawal') }}">退会</a>
        </div>
        <div>

        </div>
        <div>
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
</div>

@endsection




