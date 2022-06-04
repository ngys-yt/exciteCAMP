@extends('header')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/create_profile.css') }}">
    <script src="{{ asset('/js/create_profile.js') }}"></script>

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
                <input class="form-control" type="name" name="name" value="{{ Auth::user()->name }}" required>
                <div class="valid-feedback">OK.</div>
                <div class="invalid-feedback">必須項目です</div>
            </div>
            <div>
                自己紹介
                <textarea class="form-control" name="profile" rows="5">{{ Auth::user()->profile }}</textarea> {{-- cols=横幅、rows=高さ --}}
            </div>
            <div>
                Twitter
                <input class="form-control" type="url" name="twitter" value="{{ Auth::user()->twitter }}">
            </div>
            <div>
                Instagram
                <input class="form-control" type="url" name="instagram" value="{{ Auth::user()->instagram }}">
            </div>
            <div>
                Facebook
                <input class="form-control" type="url" name="facebook" value="{{ Auth::user()->facebook }}">
            </div>
            <div>
                Youtube
                <input class="form-control" type="url" name="youtube" value="{{ Auth::user()->youtube }}">
            </div>
            <div class="button">
                <a href="{{ route('mypage') }}">キャンセル</a>
                <input class="submit" type="submit" value="登録">
            </div>
        </form>
    </div>
    <script>
        // (function() {
        //     // 厳格モード
        //     'use strict';
        //         // load ページの読み込みが完了した時
        //         window.addEventListener('load', function() {
        //         // className 取得
        //         const forms = document.getElementsByClassName('needs-validation');
        //         const validation = Array.prototype.filter.call(forms, function(form) {
        //             // submitイベントでバリデーションを実行する
        //             form.addEventListener('submit', function(event) {
        //             // バリデーションを実行する
        //             if (form.checkValidity() === false) {
        //                 // バリデーション失敗時にsubmitイベントを停止させる
        //                 event.preventDefault();
        //                 event.stopPropagation();
        //             }
        //             // バリデーション終了のCSSクラスを追加する
        //             form.classList.add('was-validated');
        //             }, false);
        //         });
        //     }, false);
        // })();
    </script>
@endsection