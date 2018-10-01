@if(Session::has('message'))
	{{ Session::get('message') }}
@endif


<h1>Products</h1>
@foreach($products as $product)
	<h3>{{ $product->name }}</h3>
	{{ $product->price }}
	<form action="{{ route('cart.store') }}" method="POST">
		<input type="hidden" name="id" value="{{ $product->id }}">
		<input type="number" min="1" max="5" value="1" name="qty">
    	{!! csrf_field() !!}
		<button>Add To Cart</button>
	</form>
	
@endforeach
<h1>{{ Cart::count() }}</h1>
<h3><a href="{{ route('cart.index') }}">Cart</a></h3>