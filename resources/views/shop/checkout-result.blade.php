@extends('layouts.master')

@section('title')
Checkout
@endsection

@section('content')
	@if ($result == 'success')
		 <h1>Thanks for your purchase!</h1>
	@elseif($result=='cancel')
		<h3>
			Forgot to add something to your cart? Shop around then come back to pay!
		</h3>
	@endif
@endsection