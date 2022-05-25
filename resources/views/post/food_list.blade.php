@extends('header')

@section('head')
@endsection

@section('body')
    <h1>料理投稿一覧</h1>
    <div>
        @foreach ($id_photo as $photo)
            <a href="{{ route('post_detail',['id' => $photo->id]) }}">
                <img src="{{ $photo->photo }}" alt="" width="150px" height="150px">
            </a>
        @endforeach
    </div>
@endsection
    