@section('page-title', $product->name. ' 的商品詳細資訊 - ' . config('app.name', 'Laravel'))
@section('nav-title', config('app.name', 'Laravel'))
@section('nav-type', '商品 '. $product->name .' 的詳細資訊')

@section('page-content')
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
						賣家 {{$product->seller->user->name}} • 分類 {{$product->category->name}} • 更新時間 {{$product->updated_at}}
					</p>
					<p>
						{{$product->description}}
					</p>
					<div class="card m-1">
						<div class="pt-2 pb-2 pl-2 pr-4">
							<div class="row">
								<div class="col-auto">售價</div>
								<input class="col" value="${{$product->price}}" type="text" readonly />
							</div>
						</div>
					</div>
					<div class="card m-1">
						<div class="pt-2 pb-2 pl-2 pr-4">
							<div class="row">
								<div class="col-auto">庫存尚餘</div>
								<input class="col" value="{{$product->amount}}" type="text" readonly />
							</div>
						</div>
					</div>
					<div class="d-block m-1">
						<div class="pt-2 pb-2 pl-2 pr-4">
							<div class="row">
								<div class="col">
									<form action="{{route('users.cart_items.store')}}" method="post">
										@csrf
										@method('POST')
										<input name="product" value="{{$product->id}}" type="hidden" />
										<div class="text-right">
											<button class="btn btn-outline-dark mt-auto" type="submit">加到購物車</button>
											<a href="{{route('products.approx',['product'=>$product->id])}}" class="btn btn-outline-dark mt-auto" data-type="approx">追蹤</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container w-100">
				<div><h3>評論區</h3></div>
				<div class="card p-2">
					<!-- 使用者評論 -->
					<table class="table">
						@foreach($product->comments()->get() as $comment)
							<tr>
								<td>{{$comment->user->name}} 說： <span style="font-size:12px;color:#aaa;">{{$comment->updated_at}}</span><br/>{{$comment->description}}</td>
								<td class="text-left">評價<br/>{{$comment->like_score}} / 5</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>

			@if($canLeaveComment)
				<!-- 2-6-14 -->
				<!-- 曾經購買過的才能評論 -->
				<div class="container w-100 mt-2">
					<div><h3>留下你的評論</h3></div>
					<div class="card p-2">
						<!-- 留言評論 -->
						<table class="table">
							<form action="{{route('products.comment.store', ['product' => $product]) }}" method="post">
                                @csrf
                                <label for="like_score">評價分數：</label>
                                <input type="number" id="like_score" name="like_score" min="1" max="5" step="1" value="5" required>

                                <label for="comment">評論：</label>
                                <textarea name="comment" class="col" placeholder="寫下你對於此商品的評論吧!" rows="4" required></textarea>

                                <button class="btn btn-outline-dark mt-auto" type="submit">提交評論</button>

                                @if (session('status') === 'comment-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    {{-- x-init="setTimeout(() => show = false, 2000)" --}}
                                    class="text-sm text-gray-600"
                                >{{ __('提交成功!') }}</p>
                                @endif
							</form>
						</table>
					</div>
				</div>
			@endif
        </div>
    </div>
</section>
@endsection

@include('products.layouts.master')
