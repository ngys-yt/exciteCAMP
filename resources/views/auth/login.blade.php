<form action="" method="post">
    @csrf
    <div class="form-group">
        email : <input type="email" name="email">
    </div>
    <div class="form-group">
        password : <input type="password" name="password">
    </div>
    <input type="submit" value="ログイン">
</form>

@if (session('reason'))
    <div id="error_explanation" class="text-danger">
        <ul>
            <li>メールアドレスまたはパスワードが一致しません。</li>
        </ul>
    </div>
@endif

<a href="{{ route('welcome') }}">戻る</a>
