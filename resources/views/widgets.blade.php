<h1>Tester</h1>
@foreach(Krnfx::getWidgetManager() as $item)
	@php
		$view = "widgets." . $item->view
	@endphp

	@include($view)
	
@endforeach
