<form action="" method="post">
    @csrf
    <div class="form-group">
        <p>新しいパスワードを設定</p>
        <p>password : <input type="password" name="password" id="password"></p>
        <p><input type="checkbox" id="password-check">パスワードを表示</p>
    </div>
    <input type="submit" value="登録">
</form>

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