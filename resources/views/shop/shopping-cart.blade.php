@extends('layouts.master')

@section('title')
Shopping cart
@endsection

@section('content')
	@if (session('cart'))
		<ul class="list-group mt-2">
			@foreach ($products as $product)
				 <li class="list-group-item">
				 	<span class="badge">{{ $product['quantity'] }}</span>
					<strong>{{ $product['item']['title'] }}</strong>
					 <span class="label label-success">{{ $product['price'] }} $</span>
					 <div class="btn-group">
						 <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
						 <ul class="dropdown-menu">
							 <li><a href="">Reduce by 1</a></li>
							 <li><a href="">Reduce All</a></li>
						 </ul>
					 </div>
				 </li>
			@endforeach
		</ul>

		<div class="mt-2">
			<strong>Total: {{ $totalPrice }}$</strong>
			<button class="btn btn-success">Checkout</button>
		</div>
	@else

	@endif
@endsection