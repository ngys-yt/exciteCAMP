@extends('header')

@section('head')
@endsection
    
@section('body')
    <div>
        <div class="container">
            <h1>プロフィール画面</h1>
            <div>
                背景<img src="{{ $user->cover }}" alt="" style="width: 100px;">
            </div>
            <div>
                画像<img src="{{ $user->image }}" alt="" style="width: 100px;">
            </div>
            <div>
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
            <div>
                自己紹介<br>
                {!! nl2br($user->profile) !!}   
                {{-- <br>(特殊文字)をエスケープさせないために !! で囲む --}}
                {{-- <br>以外をエスケープさせるために nl2br をつける --}}
            </div>
            <div class="item">
                <a href="{{ $user->twitter }}">
                    <i class="fab fa-twitter-square"></i>
                </a>
                <a href="{{ $user->instagram }}">
                    <i class="fab fa-instagram-square"></i>
                </a>
                <a href="{{ $user->facebook }}">
                    <i class="fab fa-facebook-square"></i>
                </a>
                <a href="{{ $user->youtube }}">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
            <div>
                <a href="{{ route('ff_list',['id' => $user->id]) }}?1=follow">フォロー</a>
                <a href="{{ route('ff_list',['id' => $user->id]) }}?2=follower">フォロワー</a>
                <a href="{{ route('contact') }}">問い合わせ</a>
                <a href="{{ route('create_profile') }}">編集</a>
                <a href="{{ route('edit_password') }}">パスワード変更</a>
                <a href="{{ route('withdrawal') }}">退会</a>
            </div>
            <div>
                {{-- カテゴリー選択ボタン --}}
                <a href="{{ route('profile_detail',['id' => $user->id]) }}?d=all">全て</a>
                <a href="{{ route('profile_detail',['id' => $user->id]) }}?c=CAMP">CAMP</a>
                <a href="{{ route('profile_detail',['id' => $user->id]) }}?c=FOOD">FOOD</a>
                <a href="{{ route('profile_detail',['id' => $user->id]) }}?c=GEAR">GEAR</a>
            </div>
            <div>
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
                        <img src="{{ $post->photo }}" alt="" style="width: 100px">
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
    