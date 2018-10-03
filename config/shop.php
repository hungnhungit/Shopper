<?php 

return [
	'name' => env('SHOP_NAME', 'Laracom'),
	'menu' => [
		'Product' => [
			'route' => 'product.index',
			'icon' => 'fa fa-product'
		],
		'Cart' => [
			'route' => 'cart.index',
			'icon' => 'fa fa-cart'
		]
	]
]


 ?>