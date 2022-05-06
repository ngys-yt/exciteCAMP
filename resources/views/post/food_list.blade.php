<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        @section('camp_list')
        <h1>料理投稿一覧</h1>
        <div>
            @foreach ($id_photo as $photo)
                <a href="{{ route('post_detail',['id' => $photo->id]) }}">
                    <img src="{{ $photo->photo }}" alt="" width="150px" height="150px">
                </a>
            @endforeach
        </div>
        @endsection
    </body>
</html>
@extends('header')