@extends('header')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/create_profile.css') }}">
@endsection
    
@section('body')
    <div class="contents">
        <form  class="needs-validation" action="{{ route('create_profile') }}" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            <div>
                背景画像<img src="{{ Auth::user()->cover }}" alt="背景画像" style="width: 100px;">
                <p><input type="file" name="cover"></p>
            </div>
            <div>
                アイコン<img src="{{ Auth::user()->image }}" alt="アイコン画像" style="width: 100px;">
                <p><input type="file" name="image"></p>
            </div>
            <div>
                名前
                <input class="form-control" type="name" name="name" value="{{ Auth::user()->name }}" placeholder="名前を入力してください" required>
                <div class="valid-feedback">OK.</div>
                <div class="invalid-feedback">必須項目です</div>
            </div>
            <div>
                住所  ※プロフィールには公開されません
                <input class="form-control" type="text" name="region" value="{{ Auth::user()->region }}" placeholder="TOPページに表示されるGoogleMapの中心地点になります" required>
                <div class="valid-feedback">OK.</div>
                <div class="invalid-feedback">必須項目です</div>
            </div>
            <div>
                自己紹介
                <textarea class="form-control" name="profile" rows="5" placeholder="自己紹介を入力してください">{{ Auth::user()->profile }}</textarea> {{-- cols=横幅、rows=高さ --}}
            </div>
            <div>
                Twitter
                <input class="form-control" type="url" name="twitter" value="{{ Auth::user()->twitter }}" placeholder="TwitterのURLを貼ってください">
            </div>
            <div>
                Instagram
                <input class="form-control" type="url" name="instagram" value="{{ Auth::user()->instagram }}" placeholder="InstagramのURLを貼ってください">
            </div>
            <div>
                Facebook
                <input class="form-control" type="url" name="facebook" value="{{ Auth::user()->facebook }}" placeholder="FacebookのURLを貼ってください">
            </div>
            <div>
                Youtube
                <input class="form-control" type="url" name="youtube" value="{{ Auth::user()->youtube }}" placeholder="YoutubeのURLを貼ってください">
            </div>
            <div class="button">
                <a href="{{ route('mypage') }}">キャンセル</a>
                <input class="submit" type="submit" value="登録">
            </div>
        </form>
    </div>
    <script src="{{ asset('/js/create_profile.js') }}"></script>
@endsection