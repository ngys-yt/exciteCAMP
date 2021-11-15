@extends('header')

@section('create_profile')
<script src="https://kit.fontawesome.com/6558f17102.js" crossorigin="anonymous"></script>

<form action="{{ route('create_profile') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        背景<img src="{{ Auth::user()->cover }}" alt="" style="width: 100px;">
        <p><input type="file" name="cover"></p>
    </div>
    <div>
        画像<img src="{{ Auth::user()->image }}" alt="" style="width: 100px;">
        <p><input type="file" name="image"></p>
    </div>
    <div>
        名前
        <input type="name" name="name" value="{{ Auth::user()->name }}">
    </div>
    <div>
        自己紹介
        <textarea name="profile" id="" cols="30" rows="10">{{ Auth::user()->profile }}</textarea> {{-- cols=横幅、rows=高さ --}}
    </div>
    <div>
        Twitter
        <input type="url" name="twitter" value="{{ Auth::user()->twitter }}">
    </div>
    <div>
        Instagram
        <input type="url" name="instagram" value="{{ Auth::user()->instagram }}">
    </div>
    <div>
        Facebook
        <input type="url" name="facebook" value="{{ Auth::user()->facebook }}">
    </div>
    <div>
        Youtube
        <input type="url" name="youtube" value="{{ Auth::user()->youtube }}">
    </div>
    <input type="submit" value="登録">
</form>
@endsection



