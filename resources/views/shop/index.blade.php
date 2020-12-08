@extends('layouts.master')

@section('title')
Laravel shopping cart
@endsection

@section('content')
<div class="row">
	@foreach ($products as $product)	 
		<div class="col-sm-6 col-md-4 mt-2">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<img src="{{ $product->image_path }}" class="card-img-top"
						alt="...">
					<h5 class="card-title">{{ $product->title }}</h5>
					<p class="card-text">{{ $product->description }}</p>
						<div class="d-flex justify-content-between">
							<div class="price">{{ $product->price }}$</div>
							<a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success">Add to cart</a>
						</div>
				</div>
			</div>
		</div>
	@endforeach
</div>
<div class="mt-2 text-center">
	{{ $products->links() }}
</div>
@endsection