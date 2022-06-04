@extends('header')

@section('head')
    <link rel="stylesheet" href="{{ asset('/css/profile_detail.css') }}">
    <script src="https://kit.fontawesome.com/6558f17102.js" crossorigin="anonymous"></script>
@endsection
@section('body')
<div class="main">
    <div>
        @if ($user->cover === NULL)
            <div class="header-img-null">
                <p>exciteCAMP</p>
            </div>
        @else
            <div class="header-img">
                <img src="{{ $user->cover }}" alt="背景画像">
            </div>
        @endif
    </div>
    <div>
        @if ($user->image === NULL)
            <div class="icon-null">
                <p><i class="fas fa-user"></i></p>
            </div>
        @else
            <div class="icon-img">
                <img src="{{ $user->image }}" alt="アイコン画像">
            </div>
        @endif
    </div>
    <div class="name">
        {{ $user->name }}
    </div>
    <div class="sns">
        @isset($user->twitter)
            <a href="{{ $user->twitter }}">
                <i class="twitter fab fa-twitter-square"></i>
            </a>
        @endisset
        @isset($user->instagram)
            <a href="{{ $user->instagram }}">
                <i class="instagram fab fa-instagram-square"></i>
            </a>
        @endisset
        @isset($user->facebook)
            <a href="{{ $user->facebook }}">
                <i class="facebook fab fa-facebook-square"></i>
            </a>
        @endisset
        @isset($user->youtube)
            <a href="{{ $user->youtube }}">
                <i class="youtube fab fa-youtube"></i>
            </a>
        @endisset
    </div>
</div>
<div class="contents">
    <div class="side-menu">
        <a href="{{ route('direct_message') }}">DM</a>
        <a href="{{ route('ff_list',['id' => $user->id]) }}?1=follow">フォロー：{{ $follow_count }}人</a>
        <a href="{{ route('ff_list',['id' => $user->id]) }}?2=follower">フォロワー：{{ $follower_count }}人</a>
        <a href="{{ route('contact') }}">問い合わせ</a>
        <a href="{{ route('create_profile') }}">編集</a>
        <a href="{{ route('edit_password') }}">パスワード変更</a>
        <a href="{{ route('withdrawal') }}">退会</a>
    </div>
    <div class="contents-body">
        <div class="profile">
            {!! nl2br($user->profile) !!}   
            {{-- <br>(特殊文字)をエスケープさせないために !! で囲む --}}
            {{-- <br>以外をエスケープさせるために nl2br をつける --}}
        </div>
        <div class="category">
            {{-- カテゴリー選択ボタン --}}
            <a href="{{ route('profile_detail',['id' => $user->id]) }}?d=all">ALL</a>
            <a href="{{ route('profile_detail',['id' => $user->id]) }}?c=CAMP">CAMP</a>
            <a href="{{ route('profile_detail',['id' => $user->id]) }}?c=FOOD">FOOD</a>
            <a href="{{ route('profile_detail',['id' => $user->id]) }}?c=GEAR">GEAR</a>
        </div>
        <div class="post-img">
            @php
                if($category=request()->get('c')){
                    $posts = $user->posts()->where('category', $category)->get();
                }elseif(request()->get('d')){
                    $posts = $user->posts;
                }else{
                    $posts = $user->posts;
                }
            @endphp
            @foreach ($posts as $post)
            <a href="{{ route('post_detail', ['id'=>$post->id]) }}">
                @php
                    $photos = explode("," ,$post->photo);//photoを配列に変換
                @endphp 
                <img src="{{ $photos[0] }}" alt="投稿画像">
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('body')
        <div class="main">
            <div>
                @if ($user->cover === NULL)
                    <div class="header-img-null">
                        <p>exciteCAMP</p>
                    </div>
                @else
                    <div class="header-img">
                        <img src="{{ $user->cover }}" alt="背景画像">
                    </div>
                @endif
            </div>
            <div>
                @if ($user->image === NULL)
                    <div class="icon-null">
                        <p><i class="fas fa-user"></i></p>
                    </div>
                @else
                    <div class="icon-img">
                        <img src="{{ $user->image }}" alt="アイコン画像">
                    </div>
                @endif
            </div>
            <div class="name">
                名前:{{ $user->name }}
                @if($follow)
                    <form action="{{ route('follow') }}" name="follow" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                        <span class="follow" onclick="document.follow.submit()">
                            <div >
                                フォロー中<i class="fas fa-user" id="follow-{{ $user->id }}"></i>
                            </div>
                        </span>
                    </form>
                @else
                    <form action="{{ route('follow') }}" name="follow" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                        <span class="follow" onclick="document.follow.submit()">
                            <div>
                                フォローする<i class="far fa-user" id="follow-{{ $user->id }}"></i>
                            </div>
                        </span>
                    </form>
                @endif
            </div>
            <div class="sns">
                @isset($user->twitter)
                <a href="{{ $user->twitter }}">
                    <i class="fab fa-twitter-square"></i>
                </a>
                @endisset
                @isset($user->instagram)
                <a href="{{ $user->instagram }}">
                    <i class="fab fa-instagram-square"></i>
                    </a>
                    @endisset
                    @isset($user->facebook)
                    <a href="{{ $user->facebook }}">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    @endisset
                    @isset($user->youtube)
                    <a href="{{ $user->youtube }}">
                        <i class="fab fa-youtube"></i>
                    </a>
                @endisset
            </div>
        </div>
        <div class="contents">
            <div class="side-menu">
                <a href="{{ route('ff_list',['id' => $user->id]) }}?1=follow">フォロー</a>
                <a href="{{ route('ff_list',['id' => $user->id]) }}?2=follower">フォロワー</a>
                <a href="{{ route('contact') }}">問い合わせ</a>
                <a href="{{ route('create_profile') }}">編集</a>
                <a href="{{ route('edit_password') }}">パスワード変更</a>
                <a href="{{ route('withdrawal') }}">退会</a>
            </div>
            <div class="contents-body">
                <div class="profile">
                    {!! nl2br($user->profile) !!}   
                    {{-- <br>(特殊文字)をエスケープさせないために !! で囲む --}}
                    {{-- <br>以外をエスケープさせるために nl2br をつける --}}
                </div>
                <div class="category">
                    {{-- カテゴリー選択ボタン --}}
                    <a href="{{ route('profile_detail',['id' => $user->id]) }}?d=all">全て</a>
                    <a href="{{ route('profile_detail',['id' => $user->id]) }}?c=CAMP">CAMP</a>
                    <a href="{{ route('profile_detail',['id' => $user->id]) }}?c=FOOD">FOOD</a>
                    <a href="{{ route('profile_detail',['id' => $user->id]) }}?c=GEAR">GEAR</a>
                </div>
                <div class="post-img">
                    @php
                        if($category=request()->get('c')){
                            $posts = $user->posts()->where('category', $category)->get();
                        }elseif(request()->get('d')){
                            $posts = $user->posts;
                        }else{
                            $posts = $user->posts;
                        }
                    @endphp
                    @foreach ($posts as $post)
                    <a href="{{ route('post_detail', ['id'=>$post->id]) }}">
                        @php
                            $photos = explode("," ,$post->photo);//photoを配列に変換
                        @endphp 
                        <img src="{{ $photos[0] }}" alt="投稿画像">
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
    