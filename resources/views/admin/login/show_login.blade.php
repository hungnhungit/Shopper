<h1>Login</h1>
@if($errors->all())
    @foreach($errors->all() as $message)
        <div class="box no-border">
            <div class="box-tools">
                <p class="alert alert-warning alert-dismissible">
                    {{ $message }}
                </p>
            </div>
        </div>
 @endforeach
 @endif
<form action="{{ route('admin.login') }}" method="post">
	@csrf
	<input type="text" name="email" placeholder="Email"><br>
	<input type="password" name="password" placeholder="PassWord"><br>
	<input type="submit" value="Login">
</form>