
@extends('header')
        
@section('top_body')
        @auth
        <div class="container-fluid">
            <div class="title">
                <img src="/images/people.png" class="d-block mx-auto w-50 h-100">
            </div>

            <a href="{{ route('logout') }}">ログアウト</a>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">キャンプ</h4>
                    <p class="card-text">
                        @if ($camps)
                            @foreach ($camps as $camp)
                                <img src="{{ $camp->photo }}" alt="" width="100px" height="100px">
                            @endforeach
                        @endif
                    </p>
                    <a href="{{ route('camp_list') }}" class="btn btn-danger">もっと見る</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ギア</h4>
                    <p class="card-text">
                        @if ($foods)
                            @foreach ($foods as $food)
                                <img src="{{ $food->photo }}" alt="" width="100px" height="100px">
                            @endforeach
                        @endif
                    </p>
                    <a href="{{ route('food_list') }}" class="btn btn-danger">もっと見る</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">料理</h4>
                    <p class="card-text">
                        @if ($gears)
                            @foreach ($gears as $gear)
                                <img src="{{ $gear->photo }}" alt="" width="100px" height="100px">
                            @endforeach
                        @endif
                    </p>
                    <a href="{{ route('gear_list') }}" class="btn btn-danger">もっと見る</a>
                </div>
            </div>
        </div>
            
        @endauth
@endsection

        