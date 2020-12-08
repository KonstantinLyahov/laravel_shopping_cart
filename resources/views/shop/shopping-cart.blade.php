@extends('layouts.master')

@section('title')
	Shopping cart
@endsection

@section('content')
	@if (session('cart') && count($products)>0 && session('cart')->totalQuantity>0)
		<ul class="list-group mt-2">
			@foreach ($products as $product)
				<li class="list-group-item">
					<span class="badge">{{ $product['quantity'] }}</span>
					<strong>{{ $product['item']['title'] }}</strong>
					<span class="label label-success">- {{ $product['price'] }} $</span>
					<div class="btn-group">
						<a href="" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span
								class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{ route('shoppingCart.reduce', ['id' => $product['item']['id']]) }}">Reduce by 1</a></li>
							<li><a href="{{ route('shoppingCart.reduce', ['id' => $product['item']['id'], 'all' => true]) }}">Reduce
									All</a></li>
						</ul>
					</div>
				</li>
			@endforeach
		</ul>

		<div class="mt-2 d-flex">
			<div>
				<strong>Total: {{ $totalPrice }}$</strong>
				<button id="checkout-button" class="btn btn-success">Checkout</button>
			</div>
			<a href="{{ route('shoppingCart.clear') }}" class="ml-auto btn btn-danger">Clear cart</a>
		</div>
	@else
		<h1>Your shopping cart is empty</h1>
	@endif
@endsection

@section('scripts')
	@if (session('cart') && count($products)>0 && session('cart')->totalQuantity>0)
		<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
		<script src="https://js.stripe.com/v3/"></script>
		<script>
			var stripe = Stripe("pk_test_51HwFDGHFBCGatI023FFVAc9BAfu1rLQARhppw2nZ0LDfQf4NoIhCqkbcFNSZaDcNbF8rANHayvSpghXxFKq1HyCA00QsiGFjpM");
			var checkoutButton = document.getElementById("checkout-button");
			var data = {
				unit_amount: {{ $totalPrice }}
			}
			checkoutButton.addEventListener("click", function () {
				fetch("{{ route('checkout.createSession') }}", {
					method: "POST",
					headers: {
						"Content-Type": "application/json",
						"Accept": "application/json, text-plain, */*",
						"X-Requested-With": "XMLHttpRequest",
						"X-CSRF-TOKEN": "{{ csrf_token() }}"
					},
					body: JSON.stringify(data)
				})
				.then(function (response) {
					return response.json();
				})
				.then(function (session) {
					return stripe.redirectToCheckout({ sessionId: session.id });
				})
				.then(function (result) {
					// If redirectToCheckout fails due to a browser or network
					// error, you should display the localized error message to your
					// customer using error.message.
					if (result.error) {
						alert(result.error.message);
					}
				})
				.catch(function (error) {
					console.error("Error:", error);
				});
			});
		</script>
	@endif
@endsection