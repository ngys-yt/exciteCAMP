
<form action="" method="post">
    @csrf
    <div class="form-group">
        email : <input type="email" name="email" value="{{ old('email') }}">
    </div>
    @error('email')
    <li>{{$message}}</li>
    @enderror
    <input type="submit" value="送信">
</form>
<a href="{{ route('welcome') }}">戻る</a>       
    