<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/6558f17102.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div>
            <i class="fas fa-fire"></i>
            <p class="title">exciteCAMP</p>
        </div>
        <div class="push">
            <a href="{{ route('register_contact') }}" class="btn btn-border"><span>会員登録</span></a>
            <a href="{{ route('login') }}" class="btn btn-border"><span>ログイン</span></a>
        </div>
    </body>
</html>


