<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/register_contact.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/6558f17102.js" crossorigin="anonymous"></script>
    </head>
    <body>   
        <div class="container">
            <i class="fas fa-fire"></i>
            <h2>exciteCAMP<small>会員登録</small></h2>
            <form action="" method="POST">
                @csrf
                <div class="group">
                    <input class="input" type="text" name="name" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Name</label>
                </div>
                <div class="group">      
                    <input class="input" type="email" name="email" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Gmail</label>
                </div>
                <div class="button">
                    <input  class="submit" type="submit" value="送信">
                </div>
            </form>

            @if (Session::has('email_exists'))
            <div class="message">
                <p>{{ session('email_exists') }}</p>
            </div>
            @endif
            
            <p class="footer">
                {{-- お問合せフォーム --}}
            </p>
            
        </div>
    </body>
</html>


