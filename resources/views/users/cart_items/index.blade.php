<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
			@section('page-title', '購物車')
            {{ __('購物車') }}
        </h2>
    </x-slot>
	<script src="{{asset('js/priceCounter.js')}}"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
				@if($cart_items->count() > 0)
					<table class="table">
					<thead>
						<tr>
                            <th scope="col">#</th>
                            <th scope="col">商品圖片</th>
                            <th scope="col">商品名稱</th>
                            <th scope="col">數量</th>
                            <th scope="col">總金額</th>
                            <th scope="col">賣家</th>
                            <th scope="col">操作</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($cart_items as $cart_item)
                            <tr data-id="{{$cart_item->id}}">
                                <th scope="row">{{$cart_item->id}}</th>
                                <td><img src="{{$cart_item->product->photo_url}}" width="64"></td>
                                <td>{{$cart_item->product->name}}</td>
                                <td><input style="width:100px;" type="number" onchange="onCartChange(this, true);" onkeyup="onCartChange(this, false);" min="1" value="{{$cart_item->amount}}" /></td>
                                <td data-price="{{$cart_item->product->price}}">${{$cart_item->product->price * $cart_item->amount}}</td>
                                <td>{{$cart_item->product->seller->user->name}}</td>
                                <td>
                                    <form class="update d-inline-block" action="{{route('users.cart_items.update',['cart_item'=>$cart_item->id])}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input name="amount" value="{{$cart_item->amount}}" type="hidden">
                                        <button class="btn btn-success" type="submit">更新</button>
                                    </form>
                                    <form class="delete d-inline-block" onsubmit="return confirm('確定刪除？');" action="{{route('users.cart_items.destroy',['cart_item'=>$cart_item->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">刪除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
					</tbody>
                        <tfoot>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">小計</th>
                                <th data-total scope="col">$0</th>
								<th scope="col"></th>
                                <!-- 2-6-20 功能 -->
                                <th scope="col">
                                    <form action="{{ route('users.orders.store') }}" method="post">
                                        @csrf
                                        <button class="btn btn-success" type="submit">結帳</button>
                                    </form>
                                </th>
                            </tr>
                        </tfoot>
					</table>
				@else
					哎呀！你好像沒有想買的東西呢！
				@endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
