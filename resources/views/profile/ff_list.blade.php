@extends('header')

@section('head')
@endsection
    
@section('body')
    <div>
        @if (request()->get('1'))
            @if($follow_users)
                @foreach ($follow_users as $follow_user)
                    <a href="{{ route('profile_detail',['id' => $follow_user->id]) }}">{{ $follow_user->name }}</a>
                @endforeach
            @endif
        @elseif(request()->get('2'))
            @if($follower_users)
                @foreach ($follower_users as $follower_user)
                    <a href="{{ route('profile_detail',['id' => $follower_user->id]) }}">{{ $follower_user->name }}</a>
                @endforeach
            @endif
        @endif
    </div>
@endsection