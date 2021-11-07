@extends('header')
@section('camp_list')
<h1>料理投稿一覧</h1>
<div>
    @foreach ($id_photo as $photo)
        <a href="{{ route('post_detail',['id' => $photo->id]) }}">
            <img src="{{ $photo->photo }}" alt="" style="width: 100px">
        </a>
    @endforeach
</div>
@endsection

