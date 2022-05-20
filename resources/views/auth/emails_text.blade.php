<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        <div>
            <p>まだ登録は完了していません。</p>
    
            <p>下記ページから登録を進めてください。</p>
            
            <a href="{{ route('verify',['token' => $token]) }}">{{ $token }}</a>
        </div>
    </body>
</html>
