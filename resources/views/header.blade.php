<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>exciteCAMP</title>

        <style>
            html,body{
                height: 100%;
            }
            
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

            .title{
                height: 400px;
                background-color:rgb(5, 7, 12);
            }

            .heart{
                color: red;
                border: none;  /* 枠線を消す */
                outline: none; /* クリックしたときに表示される枠線を消す */
                background: transparent; /* 背景の灰色を消す */
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/chat.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
                    <a href="{{ route('mypage') }}" class="menu-item">
                        <div class="item-box">
                            <i class="fas fa-user"></i>
                            <div class="item">マイページ</div>
                        </div>
                    </a>
                    <a href="{{ route('notice') }}" class="menu-item">
                        <div class="item-box">
                            <i class="fas fa-bell"></i>
                            <div class="item">通知</div>
                        </div>
                    </a>
                    <a href="{{ route('camp_list') }}" class="menu-item">
                        <div class="item-box">
                            <i class="fas fa-campground"></i>
                            <div class="item">CAMP</div>
                        </div>
                    </a>
                    <a href="{{ route('gear_list') }}" class="menu-item">
                        <div class="item-box">
                            <i class="fas fa-hammer"></i>
                            <div class="item">GEAR</div>
                        </div>
                    </a>
                    <a href="{{ route('food_list') }}" class="menu-item">
                        <div class="item-box mr-2">
                            <i class="fas fa-utensils"></i>
                            <div class="item">FOOD</div>
                        </div>
                    </a>
                </ul>
            </nav>
        </div>
    </header>
    <body>   
        @yield('top_body')
        @yield('create_profile')
        @yield('edit_profile')
        @yield('profile_detail')
        @yield('mypage')
        @yield('camp_list')
        @yield('cook_list')
        @yield('create_post')
        @yield('post_detail')
        @yield('gear_list')
        @yield('category')
        @yield('direct_message')
        @yield('extract_user')
    </body>
</html>
