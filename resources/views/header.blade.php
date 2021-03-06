<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>exciteCAMP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-------- google API ----------}}
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        {{-------- bootstrap -----------}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        {{------- fontawesome ----------}}
        <script src="https://kit.fontawesome.com/6558f17102.js" crossorigin="anonymous"></script>
        {{------------ css -------------}}
        <link rel="stylesheet" href="{{ asset('/css/header.css') }}">
        {{---------------- section ------------------}}
        @yield('head')
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
                        <div class="item-box">
                            <i class="fas fa-utensils"></i>
                            <div class="item">FOOD</div>
                        </div>
                    </a>
                    <a href="{{ route('logout') }}" class="menu-item">
                        <div class="item-box mr-2">
                            <i class="fas fa-sign-out-alt"></i>
                            <div class="item">ログアウト</div>
                        </div>
                    </a>
                </ul>
            </nav>
        </div>
    </header>
    <body>
        @yield('body')
    </body>
</html>
