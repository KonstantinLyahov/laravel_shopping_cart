@extends('layouts.auth')

@section('title')
	Sign In
@endsection

@section('content')
	<h1>Sign In</h1>
	@if ($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)			 
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
	<form action="{{ route('signin.post') }}" method="post">
		@csrf
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Sign In</button>
	</form>
@endsection