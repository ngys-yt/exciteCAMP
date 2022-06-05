@extends('header')

@section('head')
    <link rel="stylesheet" href="{{ asset('/css/ff_list.css') }}">
@endsection

@section('body')
    <div class="container">
        <div class="switching">
            <a href="{{ route('ff_list',['id' => $user_id]) }}?1=follow">フォロー</a>
            <a href="{{ route('ff_list',['id' => $user_id]) }}?2=follower">フォロワー</a>
        </div>
        <div class="list">
        @if (request()->get('1'))
            @if($follow_users)
                @foreach ($follow_users as $follow_user)
                <div class="user">
                    <a href="{{ route('profile_detail',['id' => $follow_user->id]) }}">{{ $follow_user->name }}</a>
                </div>
                @endforeach
            @endif
        @endif
        </div>
        <div class="list">
        @if(request()->get('2'))
            @if($follower_users)
                @foreach ($follower_users as $follower_user)
                <div class="user">
                    <a href="{{ route('profile_detail',['id' => $follower_user->id]) }}">{{ $follower_user->name }}</a>
                </div>
                @endforeach
            @endif
        @endif
        </div>
    </div>
@endsection