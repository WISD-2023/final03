<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{route('products.index')}}">{{config('app.name', 'Laravel')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('products.index')}}">首頁</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">瀏覽</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('products.index')}}">所有商品</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{route('users.index')}}">會員主頁</a></li>
                        @if(auth()->user() != null && auth()->user()->seller()->get()->count() > 0)
							<li><a class="dropdown-item" href="#!">賣家主頁</a></li>
						@endif
                    </ul>
                </li>
				<form action="{{route('products.search')}}" method="get" class="nav-item">
					<input class="form-control d-inline-block w-75" name="search" placeholder="搜尋..." value="{{$search ?? ''}}" required />
					<button class="btn btn-outline-dark" type="submit">搜尋</button>
				</form>
            </ul>
            <form class="d-flex">
				@auth
					<a class="btn btn-outline-dark" href="{{route('cart_items.index')}}">
						<i class="bi-cart-fill me-1"></i>
						購物車
						<span class="badge bg-dark text-white ms-1 rounded-pill">{{$cart_items_amount}}</span>
					</a>
				@else
					<a class="btn btn-outline-dark" href="{{route('login')}}">
						<i class="bi-key-fill me-1"></i>
						登入
					</a>
				@endauth
            </form>
        </div>
    </div>
</nav>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">@yield('nav-title')</h1>
            <p class="lead fw-normal text-white-50 mb-0">@yield('nav-type')</p>
        </div>
    </div>
</header>