@foreach($products as $product)
	<h3>{{ $product->name }}</h3>
	<a href="#" class="btn btn-danger">Delete wishlist</a>
@endforeach