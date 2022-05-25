@extends('header')

@section('head')
    <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6558f17102.js" crossorigin="anonymous"></script>
@endsection

@section('body')
    @auth
    <div class="top-img">
        <img src="/images/top.jpg" alt="焚き火の写真" width="100%" height="600px">
        <i class="title-fas fas fa-fire"></i>
        <p class="title">exciteCAMP</p>
        <p class="title2">自分のキャンプを自由に表現しよう</p>
    </div>
    <div class="container-fluid">
        <div class="card w-75 mx-auto">
            <div class="card-body">
                <h4 class="card-title">CAMP</h4>
                <p class="card-text">
                    @if ($camps)
                        @foreach ($camps as $camp)
                        <a href="{{ route('post_detail', ['id'=>$camp->id]) }}">
                            <img src="{{ $camp->photo }}" alt="" width="150px" height="150px">
                        </a>
                        @endforeach
                    @endif
                </p>
                <a href="{{ route('camp_list') }}" class="btn btn-danger">もっと見る</a>
            </div>
        </div>
        <div class="card w-75 mx-auto">
            <div class="card-body">
                <h4 class="card-title">GEAR</h4>
                <p class="card-text">
                    @if ($gears)
                        @foreach ($gears as $gear)
                        <a href="{{ route('post_detail', ['id'=>$gear->id]) }}">
                            <img src="{{ $gear->photo }}" alt="" width="150px" height="150px">
                        </a>
                        @endforeach
                    @endif
                </p>
                <a href="{{ route('gear_list') }}" class="btn btn-danger">もっと見る</a>
            </div>
        </div>
        <div class="card w-75 mx-auto">
            <div class="card-body">
                <h4 class="card-title">FOOD</h4>
                <p class="card-text">
                    @if ($foods)
                        @foreach ($foods as $food)
                        <a href="{{ route('post_detail', ['id'=>$food->id]) }}">
                            <img src="{{ $food->photo }}" alt="" width="150px" height="150px">
                        </a>
                        @endforeach
                    @endif
                </p>
                <a href="{{ route('food_list') }}" class="btn btn-danger">もっと見る</a>
            </div>
        </div>
    </div>
    @endauth
@endsection