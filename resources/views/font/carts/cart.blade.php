 <h1>Cart</h1>
@if(count($carts) <= 0)
    <p>Empty</p>
    <a href="{{ route('admin.product.index') }}">Back Product</a>
@else
	@foreach($carts as $cart)
		<p>{{ $cart->name }}</p>
		<p>{{ $cart->qty }}</p>
		<form action="{{ route('cart.destroy',$cart->rowId) }}" method="POST">
			{!! method_field('delete') !!}
    		{!! csrf_field() !!}
			<button>Delete Item</button>
		</form>
	@endforeach
	<h2>Total : {{$total}}</h2>
	<a href="{{ route('cart.clear') }}">Clear Cart</a>
@endif
