@extends('header')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/create_post.css') }}">
@endsection

@section('body')
    <div class="main">
        <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
            <div class="category-detail">
                <div>
                    <p>カテゴリー</p>
                    <p class="category">{{ $category }}</p>
                    <input type="hidden" name="category" value="{{$category}}">
                </div>
                @if ( $category == 'CAMP' )
                    <div>
                        <p>エリア</p>
                        <p class="kind_1">{{ $kind_1 }}</p>
                        <input type="hidden" name="kind_1" value="{{$kind_1}}">
                    </div>
                    <div>
                        <p>キャンプ場</p>
                        <p class="kind_2">{{ $kind_2 }}</p>
                        <input type="hidden" name="kind_2" value="{{$kind_2}}">
                    </div>
                @elseif ( $category == 'FOOD' )
                    <div>
                        <p>料理名</p>
                        <p class="kind_1">{{ $kind_1 }}</p>
                        <input type="hidden" name="kind_1" value="{{$kind_1}}">
                    </div>
                    <div>
                        <p>使用アイテム</p>
                        <p class="kind_2">{{ $kind_2 }}</p>
                        <input type="hidden" name="kind_2" value="{{$kind_2}}">
                    </div>
                @elseif ( $category == 'GEAR' )
                    <div>
                        <p>ブランド名</p>
                        <p class="kind_1">{{ $kind_1 }}</p>
                        <input type="hidden" name="kind_1" value="{{$kind_1}}">
                    </div>
                    <div>
                        <p>アイテム</p>
                        <p class="kind_2">{{ $kind_2 }}</p>
                        <input type="hidden" name="kind_2" value="{{$kind_2}}">
                    </div>
                @endif
            </div>
            <div class="form-group">
                <input type="file" name="files[][photo]" id="select_file" accept="image/*" onchange="check();" multiple required>
                <div class="valid-feedback">OK.</div>
                <div class="invalid-feedback">必須項目です</div>
            </div>
            <div class="form-group row col-md-6 offset-md-3">
                <input type="text" name="title" class="form-control" placeholder="タイトル" required>
                <div class="valid-feedback">OK.</div>
                <div class="invalid-feedback">必須項目です</div>
            </div>
            <div class="form-group row col-md-6 offset-md-3">
                <textarea name="content" rows="9" class="form-control" placeholder="投稿内容" required></textarea>
                <div class="valid-feedback">OK.</div>
                <div class="invalid-feedback">必須項目です</div>
            </div>
            <a href="{{ route('category') }}">キャンセル</a>
            <input class="submit" type="submit" value="投稿">
        </form>
    </div>
    <script src="{{ asset('/js/create_post.js') }}"></script>
@endsection