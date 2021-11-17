<div>
    @if ($follow_users || $follower_users)
        @if (request()->get('1'))
            @foreach ($follow_users as $follow_user)
                <a href="{{ route('profile_detail',['id' => $follow_user->id]) }}">{{ $follow_user->name }}</a>
            @endforeach
        @elseif(request()->get('2'))
            @foreach ($follower_users as $follower_user)
                <a href="{{ route('profile_detail',['id' => $follower_user->id]) }}">{{ $follower_user->name }}</a>
            @endforeach
        @endif
    @endif
</div>