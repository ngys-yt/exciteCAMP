<head>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>   
    <div class="container">
        
        
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
        <div>
            <p>{{ session('email_exists') }}</p>
        </div>
        @endif

        @if ( Session::has('sent'))
        <div>
            <p>{{old('name')}}さん、{{ session('sent') }}</p>
            <p>メール本文からサイトにアクセスしてください。</p>
        </div>
        @endif
        
        <p class="footer">
            {{-- お問合せフォーム --}}
        </p>
        
    </div>
</body>

