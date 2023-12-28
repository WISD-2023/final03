<!DOCTYPE html>
<html lang="en">
    <head>
		@section('page-title', '商品詳細資訊 - ' . config('app.name', 'Laravel'))
		@include('products.layouts.header')
    </head>
    <body>
		@section('nav-title', config('app.name', 'Laravel'))
		@section('nav-type', '商品 '. $product->name .' 的詳細資訊')
		@include('products.layouts.navigation')
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
					<div class="container w-100 d-flex">
						<div>
							<img class="img-thumbnail" src="{{$product->photo_url}}" />
						</div>
						<div class="text-left pl-3 pt-2 w-50">
							<h3>{{$product->name}}</h3>
							<p>
								{{$product->description}}
							</p>
						</div>
					</div>
                </div>
            </div>
        </section>
		@include('products.layouts.footer')
    </body>
</html>
