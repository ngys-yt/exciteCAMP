<head>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body> 
    <div class="container">

        <h2>exciteCAMP<small>Login</small></h2>
        
            
        <form action="" method="POST">
            @csrf
            <div class="group">
                <input class="input" type="email" name="email" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Mail</label>
            </div>
            <div class="group2">      
                <input class="input" type="password" name="password" id="password" required>
                <span id="buttonEye" class="fa fa-eye" onclick="pushHideButton()"></span>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Password</label>
            </div>
            <div class="checkbox">
                <input class="box"  type="checkbox" id="password-check">パスワードを表示
            </div>
            <div class="button">
                <input class="submit" type="submit" value="ログイン">
            </div>
        </form>
        @if (session('reason'))
            <div>
                <p>メールアドレスまたはパスワードが一致しません。</p>
            </div>
        @endif
        <p class="footer">
            {{-- お問合せフォーム --}}
        </p>
    </div>
</body>

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