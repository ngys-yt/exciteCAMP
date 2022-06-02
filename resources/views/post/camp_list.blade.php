@extends('header')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/post_list.css') }}">
@endsection

@section('body')
    <h1>キャンプ投稿一覧</h1>
    <div class="container">
        <div class="post">
            @foreach ($id_photo as $photo)
                <a href="{{ route('post_detail',['id' => $photo->id]) }}">
                @php
                    $camp_arr = explode("," ,$photo->photo);
                @endphp 
                <img src="{{ $camp_arr[0] }}" alt="投稿画像" width="150px" height="150px">
                </a>
            @endforeach
        </div>
    </div>
@endsection