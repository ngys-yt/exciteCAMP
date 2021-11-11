
@extends('header')
@section('top_style')
<style>
.title{
    height: 400px;
    background-color:rgb(5, 7, 12);
}
</style>
@endsection 
        
@section('top_body')
        @auth
            <div class="title">
                <img src="/images/people.png" class="d-block mx-auto w-50 h-100">
            </div>
            <a href="{{ route('logout') }}">ログアウト</a>
        @endauth
@endsection

        