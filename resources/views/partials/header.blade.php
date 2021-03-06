<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="{{ route('product.index') }}">Navbar</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('product.shoppingCart') }}">
					<i class="fas fa-shopping-cart"></i>
					<span>Shopping cart</span>
					<span class="badge badge-dark">{{ session('cart')? session('cart')->totalQuantity: '' }}</span>
				</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user"></i>
					<span>User account</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					@if (Auth::check())
					<a class="dropdown-item" href="{{ route('profile.page') }}">Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
					@else
						<a class="dropdown-item" href="{{ route('signin.page') }}">Sign In</a>
						<a class="dropdown-item" href="{{ route('signup.page') }}">Sign Up</a>
					@endif
					
				</div>
			</li>
		</ul>
	</div>
</nav>