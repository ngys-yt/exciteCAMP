<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/register_main.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/6558f17102.js" crossorigin="anonymous"></script>
    </head>
    <body> 
        <div class="container">
            <i class="fas fa-fire"></i>
            
            <h2>
                <a href={{ route('welcome') }}>exciteCAMP</a>
                <small>パスワード登録</small>
            </h2>
            <form action="" method="POST">
                @csrf
                <div class="group">      
                    <input class="input" type="password" name="password" id="password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Password</label>
                </div>
                <div class="checkbox">
                    <input class="box"  type="checkbox" id="password-check">パスワードを表示
                </div>
                <div class="button">
                    <input class="submit" type="submit" value="登録">
                </div>
            </form>
            <p class="footer">
                {{-- お問合せフォーム --}}
            </p>
        </div>
        <script>
            const pwd = document.getElementById('password');
            const pwdCheck = document.getElementById('password-check');
            pwdCheck.addEventListener('change', function() {
                if(pwdCheck.checked) {
                    pwd.setAttribute('type', 'text');
                } else {
                    pwd.setAttribute('type', 'password');
                }
            }, false);
        </script> 
    </body>
</html>
