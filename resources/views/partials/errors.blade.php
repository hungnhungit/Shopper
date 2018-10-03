@if(Session::has('message'))
<div class="alert alert-success message">
	<span>{{ Session::get('message') }}</span>
</div>
@endif