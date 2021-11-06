@extends('header')
@section('category')
<body>
<div class="container mt-3">
    <h2>カテゴリー選択</h2>
{{-- モーダルでボタン３つ表示、中身が違う⇨data-targetとidをそれぞれ変更する --}}
<!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#camp">
        CAMP
    </button>
    <!-- The Modal -->
    <div class="modal fade">
        <div class="modal-dialog" .modal-lg>
            <div class="modal-content">
        <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">CAMP</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
        <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('create_post') }}" method="post">
                        <div class="form-group">
                            @csrf
                            都道府県:
                            <select>
                            @foreach(config('pref') as $pref_id => $name)
                                <option value="{{ $pref_id }}">{{ $name }}</option>
                            @endforeach
                            </select>
                            <input type="text" id="keyword" autocomplete="off"><button id="search">検索実行</button>
                            <button id="clear">結果クリア</button>
                            <div id="map"></div>
                            @include('/category/map_body')
                        </div>
                        <input type="submit" value="決定">
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cook">
        FOOD
    </button>
    <!-- The Modal -->
    <div class="modal fade" id="cook">
        <div class="modal-dialog">
            <div class="modal-content">
        <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">FOOD</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
        <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('create_post') }}" method="get">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="category" value="FOOD">
                            料理名：<input type="text" name="kind_1">
                            @error('kind_1')
                            <li>{{$message}}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            アイテム名：
                            <select name="kind_2">
                                @foreach(config('cook') as $cook_id => $name)
                                    <option value="{{ $name }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <input type="submit" value="決定">
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gear">
        GEAR
    </button>
    <!-- The Modal -->
    <div class="modal fade" id="gear">
        <div class="modal-dialog">
            <div class="modal-content">
        <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">GEAR</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
        <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('create_post') }}" method="get">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="category" value="GEAR">
                            ブランド名：<input type="text" name="kind_1">
                            @error('kind_1')
                            <li>{{$message}}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            アイテム名：<input type="text" name="kind_2">
                            @error('kind_2')
                            <li>{{$message}}</li>
                            @enderror
                        </div>
                        <input type="submit" value="決定">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
