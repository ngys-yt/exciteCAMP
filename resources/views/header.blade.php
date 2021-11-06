<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>exciteCAMP</title>

        <style>
            header{
                display: flex;
                align-items: center;
                background-color: white;
                height: 60px;
            }
            
            header a:hover{
                color: #000 !important;
                text-decoration: none !important;
            }

            a:hover{
                text-decoration: none;
            }

            .app{
                margin-right: auto;
                font-family: 'ヒラギノ丸ゴ Pro W4';
            }

            .app-name{
                color: black;
            }

            .menu-item{
                padding: 10px;
            }

            .item-box{
                display: inline-block;
                text-align: center;
                color: black;
                font-size: 20px;
            }

            .item{
                font-size: 5px;
            }
        </style>
        @yield('top_style')

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBlZCYYOoFZOIseoW_YfdYcX5TIupEPAzI&callback=initMap" async defer></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/6558f17102.js" crossorigin="anonymous"></script>
    </head>
        <header>

        <div class="d-flex flex-row align-items-center">
            <h1 class="app ml-2">
                <a href="{{ route('top') }}" class="app-name">
                    <i class="fas fa-fire"></i>
                    exciteCAMP
                </a>
            </h1>
            <nav>
                <ul>
                    <a href="{{ route('category') }}" class="menu-item">
                        <div class="item-box">
                            <i class="far fa-plus-square"></i>
                            <div class="item">投稿</div>
                        </div>
                    </a>
                    <a href="{{ route('profile_detail') }}" class="menu-item">
                        <div class="item-box">
                            <i class="fas fa-user"></i>
                            <div class="item">マイページ</div>
                        </div>
                    </a>
                    <a href="{{ route('camp_list') }}" class="menu-item">
                        <div class="item-box">
                            <i class="fas fa-campground"></i>
                            <div class="item">キャンプ</div>
                        </div>
                    </a>
                    <a href="{{ route('gear_list') }}" class="menu-item">
                        <div class="item-box">
                            <i class="fas fa-hammer"></i>
                            <div class="item">ギア</div>
                        </div>
                    </a>
                    <a href="{{ route('cook_list') }}" class="menu-item">
                        <div class="item-box mr-2">
                            <i class="fas fa-utensils"></i>
                            <div class="item">料理</div>
                        </div>
                    </a>
                </ul>
            </nav>
        </div>
    </header>
    @yield('top_body')
    @yield('create_profile')
    @yield('edit_profile')
    @yield('profile_detail')
    @yield('profile_info')
    @yield('camp_list')
    @yield('cook_list')
    @yield('create_post')
    @yield('post_detail')
    @yield('gear_list')
    @yield('category')

</html>
