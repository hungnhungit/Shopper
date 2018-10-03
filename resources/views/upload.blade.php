<h1>User Upload file</h1>

<form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file">
	<input type="submit" value="upload">
</form>