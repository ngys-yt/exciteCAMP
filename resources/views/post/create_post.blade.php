<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        @section('create_post') 
        <div>
            <form action="" method="post" enctype="multipart/form-data">
            @csrf
                <div>
                    カテゴリー：{{$category}}
                    <input type="hidden" name="category" value="{{$category}}">
                </div>
                <div>
                    料理名：{{$kind_1}}
                    <input type="hidden" name="kind_1" value="{{$kind_1}}">
                </div>
                <div>
                    使用アイテム：{{$kind_2}}
                    <input type="hidden" name="kind_2" value="{{$kind_2}}">
                </div>
                <div class="form-group">
                    photo
                    <input type="file" name="photo">
                    @error('photo')
                    <li>{{$message}}</li>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="title" placeholder="タイトル">
                    @error('title')
                    <li>{{$message}}</li>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="content" id="" cols="30" rows="3" placeholder="投稿内容"></textarea>
                    @error('content')
                    <li>{{$message}}</li>
                    @enderror
                </div>
                <input type="submit" value="投稿">
            </form>
        </div>
        @endsection
    </body>
</html>
@extends('header')

