@extends('header')
@section('camp_list')
<h1>キャンプ投稿一覧</h1>
<div>
    @foreach ($id_photo as $photo) {{-- postのidとphotoを$photoで回す --}}
        <a href="{{ route('post_detail',['id' => $photo->id]) }}"> {{-- $photo->id routeにidを渡す --}}
            <img src="{{ $photo->photo }}" alt="" width="150px" height="150px"> {{-- $photo->photo 写真表示 --}}
        </a>
    @endforeach
</div>
@endsection

