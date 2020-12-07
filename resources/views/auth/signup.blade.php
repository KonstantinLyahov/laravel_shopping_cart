@extends('layouts/auth')

@section('title')
	Sign Up
@endsection

@section('content')	 
	<h1>Sign Up</h1>
	@if ($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)			 
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
	<form action="{{ route('signup.post') }}" method="POST">
		@csrf
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control">
		</div>
		<div class="form-group">
			<label for="password_confirmation">Confirm Password</label>
			<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Sign Up</button>
	</form>
@endsection
