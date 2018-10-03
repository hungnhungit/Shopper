@extends('layouts.app')


@section('content')

@php

$menus = config('shop.menu');

@endphp

<ul>
	@foreach($menus as $key=>$items)

		{{ $items["icon"] }}<h3><a href="{{ route($items["route"]) }}">{{ $key }}</a></h3>

	@endforeach
</ul>


<div class="row">
	<div class="col-md-9">
		<h3> Count Cart : {{ Cart::count() }}</h3>
		<a href="{{ route('cart.index') }}">Cart</a>
		<a href="{{ route('wishlist.index') }}">Wishlist</a>
		@include('partials.errors')

		<h1>User : {{ Auth::user()->name }} , Wishlist : {{ Auth::user()->wishlists_product->count() }}</h1>

		@foreach($products->chunk(3) as $items)
			<div class="row">
				@foreach($items as $item)
					<div class="col-md-3">
					<h1>{{ str_limit($item->name,10) }}</h1>
					<p style="@if(isset($item->sale_price)) text-decoration: underline; @endif">{{ $item->price }}</p>
					<p style="color:red">{{ $item->sale_price }}</p>
					<form action="{{ route('cart.store') }}" method="POST">
						@csrf
						<input type="hidden" value="{{ $item->id }}" name="id">
						<input type="number" name="qty" min="1" max="5" value="1" class="form-control">
						<input type="submit" value="AddCart" class="btn btn-success" style="margin-top: 10px">
					</form>
					@php
						$wishlists = Auth::user()->wishlists_product->pluck('product_id')->toArray();
					@endphp
					@if( !in_array($item->id,$wishlists) )
					<a href="{{ route('product.wishlist',$item->id) }}" class="btn btn-danger">Wishlist</a>
					@endif
				</div>
				@endforeach
			</div> 
		@endforeach


		<h1>Product Random</h1>
		<div class="row">
		@foreach($products_random as $product)
					<div class="col-md-3">
						<h1>{{ str_limit($product->name,10) }}</h1>
						<p>{{ $product->price }}</p>
					</div>
		@endforeach
		</div>
	</div>
	<div class="col-md-3">
			<h3><a style="@if($selectCategory == null) color:red; @endif" href="{{ route('product.index') }}">All</a></h3>
		@foreach($categories as $category)
			<h3 style="@if($selectCategory == $category->slug) color:red; @endif"><a style="@if($selectCategory == $category->slug) color:red; @endif" href="{{ route('product.index') }}?category={{ $category->slug }}">{{ $category->name }}</a></h3>
		@endforeach
	</div>
</div>
@endsection
