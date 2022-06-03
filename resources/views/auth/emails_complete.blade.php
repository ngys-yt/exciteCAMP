<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/emails_complete.css') }}">
    </head>
    <body>
        <div>
            <h1>メール送信完了</h1>
            @if (session()->has('sent'))
                <div>
                    <p>{{old('name')}}さん、送信完了しました。</p>
                    <p>メール本文からサイトにアクセスして登録を進めてください。</p>
                </div>
            @endif
        </div>
    </body>
</html>