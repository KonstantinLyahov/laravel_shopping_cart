@extends('layouts.master')

@section('title')
Laravel shopping cart
@endsection

@section('content')
<div class="row">
	@for ($i = 0; $i < 6; $i++)	 
		<div class="col-sm-6 col-md-4 mt-2">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<img src="https://chubarov.if.ua/images/book_design_2.jpg?crc=502489758" class="card-img-top"
						alt="...">
					<h5 class="card-title">Product title</h5>
					<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem architecto ad sit laborum
						quo atque. Blanditiis consequatur laudantium, iusto hic, qui doloremque vero corrupti cum suscipit deserunt
						repellendus dolorum eveniet.</p>
						<div class="d-flex justify-content-between">
							<div class="price">12$</div>
							<a href="#" class="btn btn-success">Add to cart</a>
						</div>
				</div>
			</div>
		</div>
	@endfor
</div>
@endsection