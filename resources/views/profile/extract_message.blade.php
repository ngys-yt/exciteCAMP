@extends('header')
@section('extract_message')
<div class="container-fluid" style="height: 90%;">
    <div class="row" style="height: 90%;">
        <div class="col-4" style="border-style: double;">
            @if (Session::has('message'))
                <div>
                    {{ session('message') }}
                </div>
            @elseif($users)
                @foreach ($users as $user)
                    <div>
                        <a href="{{ route('profile_detail',['id' => $user->id]) }}">プロフ</a>
                        <a href="{{ route('get_message',['id' => $user->id]) }}">{{ $user->name }}</a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-8" style="border-style: double;">
            @include('profile.message_contents')
        </div>
    </div>
</div>
@endsection

