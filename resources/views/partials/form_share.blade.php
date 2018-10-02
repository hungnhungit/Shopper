<a class="{{ $class }}" href="{{ route($route,$id) }}" onclick="event.preventDefault();document.getElementById('product-form-{{ $form }}').submit();">{{ $title }}</a>
<form id="product-form-{{ $form }}" action="{{ route($route,$id) }}" method="post" style="display: none;">
	@csrf
	<input type="hidden" name="_method" value="{{ $method }}">
</form>