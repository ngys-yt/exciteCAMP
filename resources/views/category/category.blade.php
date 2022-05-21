<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    </head>
    <body>
    @section('category')
    <h2>カテゴリー選択</h2>
    <div class="container-fluid">
    {{-- モーダルでボタン３つ表示、中身が違う⇨data-targetとidをそれぞれ変更する --}}
        <div class="category">
            <!-- Button to Open the Modal -->
            <h3 class="camp">CAMP</h3>
            <button type="button" class="btn" id="camp_show">
                <img src="/images/category_camp.jpg" alt="テントと車の写真" height="250px" width="250px">
            </button>
        </div>
            <!-- The Modal -->
        <div class="modal fade" id="camp" role="dialog"> 
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
            <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">CAMP</h4>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
            <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            @csrf
                            都道府県:
                            <select id="pref">
                            @foreach(config('pref') as $pref_id => $name)
                                <option value="{{ $pref_id }}">{{ $name }}</option>
                            @endforeach
                            </select>
                            <input type="text" id="keyword" autocomplete="off"><button id="search">検索実行</button>
                            <button id="clear">結果クリア</button>
                            <div id="map" style="width: 100%; height: 600px;"></div>
                        </div>
                        <input type="submit" value="決定">
                    </div>
                </div>
            </div>
        </div>

        <div class="category">
            <!-- Button to Open the Modal -->
            <h3 class="food">FOOD</h3>
            <button type="button" class="btn" data-toggle="modal" data-target="#cook">
                <img src="/images/category_food.jpg" alt="料理の写真" height="250px" width="250px">
            </button>
            {{-- toggle = 何をするか  target = どの要素を開くか---↑cookというIDをもつモーダルが表示される --}}
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="cook" aria-labelledby="basicModal"aria-hidden="true">
                    {{-- idはdata-targetに合わせる --}}
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
            <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">FOOD</h4>
                        <button type="button" class="close" data-dismiss="modal"></button>
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

        <div class="category">
            <!-- Button to Open the Modal -->
            <h3 class="gear">GEAR</h3>
            <button type="button" class="btn" data-toggle="modal" data-target="#gear">
                <img src="/images/category_gear.jpg" alt="キャンプ道具の写真" height="250px" width="250px">
            </button>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="gear" aria-labelledby="basicModal"aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
            <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">GEAR</h4>
                        <button type="button" class="close" data-dismiss="modal"></button>
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
    <script src="{{ asset('/js/map.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlZCYYOoFZOIseoW_YfdYcX5TIupEPAzI&callback=initMap"></script>
    @endsection
    </body>
</html>
@extends('header')
