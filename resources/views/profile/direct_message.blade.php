
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@elseif($users)
    @foreach ($users as $user)
        <div>
            <a href="{{ route('profile_detail',['id' => $user->id]) }}">プロフ</a>
            <a href="">{{ $user->name }}</a>
        </div>
    @endforeach
@endif

