@if (Session::has('email_exists'))
    <div>
        <p>{{ session('email_exists') }}</p>
    </div>
@endif

@if (Session::has('name_exists'))
    <div>
        <p>{{ session('name_exists') }}</p>
    </div>
@endif

@if ( Session::has('sent'))
<div>
    <p>{{old('name')}}さん、{{ session('sent') }}</p>
    <p>メール本文からサイトにアクセスしてください。</p>
</div>
@endif

<form action="" method="POST">
    @csrf
    
    <p>メール：<input type="email" name="email"></p>
    <p>名前：<input type="text" name="name"></p>

    <input type="submit" value="送信">
</form>