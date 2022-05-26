@extends('header')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/create_post.css') }}">
@endsection

@section('body') 
    <div class="main">
        <form action="" method="post" enctype="multipart/form-data">
        @csrf
            <div class="category-detail">
                <div>
                    カテゴリー：{{$category}}
                    <input type="hidden" name="category" value="{{$category}}">
                </div>
                @if ($category == 'FOOD')
                    <div>
                        料理名：{{$kind_1}}
                        <input type="hidden" name="kind_1" value="{{$kind_1}}">
                    </div>
                    <div>
                        使用アイテム：{{$kind_2}}
                        <input type="hidden" name="kind_2" value="{{$kind_2}}">
                    </div>
                @elseif($category == 'GEAR')
                    <div>
                        ブランド：{{$kind_1}}
                        <input type="hidden" name="kind_1" value="{{$kind_1}}">
                    </div>
                    <div>
                        アイテム：{{$kind_2}}
                        <input type="hidden" name="kind_2" value="{{$kind_2}}">
                    </div>
                @endif
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