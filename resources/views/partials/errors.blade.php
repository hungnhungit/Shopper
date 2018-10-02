@if(Session::has('message'))
<div class="alert alert-dange">
	{{ Session::get('message') }}
</div>
@endif