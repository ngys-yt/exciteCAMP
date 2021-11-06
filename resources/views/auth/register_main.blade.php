<form action="" method="post">
    @csrf
    <div class="form-group">
        name : <input type="text" name="name" id="">
    </div>
    <div class="form-group">
        password : <input type="password" name="password" id="">
    </div>
    
    <input type="submit" value="登録">
</form>