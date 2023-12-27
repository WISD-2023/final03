<!DOCTYPE html>
<html lang="en">
    <head>
		@section('page-title', '搜尋結果 - 多方位購物網站')
		@include('products.layouts.header')
    </head>
    <body>
		@section('nav-title', '多方位購物網站')
		@section('nav-type', '商品 '. $search .' 的搜尋結果')
		@include('products.layouts.navigation')
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
					@foreach($products as $product)
						<div class="col mb-5">
							<div class="card h-100">
								<!-- Product image-->
								<a href="{{route('products.show', ['product'=>$product->id])}}"><img class="card-img-top" src="{{$product->photo_url}}" /></a>
								<!-- Product details-->
								<div class="card-body p-4">
									<div class="text-center">
										<!-- Product name-->
										<h5 class="fw-bolder"><a href="{{route('products.show', ['product'=>$product->id])}}">{{$product->name}}</a></h5>
										<!-- Product price-->
										${{$product->price}}
									</div>
								</div>
								<!-- Product actions-->
								<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
									<form action="{{route('cart_items.store')}}" method="post">
										@csrf
										@method('POST')
										<input name="product" value="{{$product->id}}" type="hidden" />
										<div class="text-center"><button class="btn btn-outline-dark mt-auto" type="submit">加到購物車</button></div>
									</form>
								</div>
							</div>
						</div>
					@endforeach
                </div>
            </div>
        </section>
		@include('products.layouts.footer')
    </body>
</html>
