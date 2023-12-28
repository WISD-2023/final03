<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('訂單明細 '.$order->no) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
					<table class="table">
					  <thead>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">商品圖片</th>
						  <th scope="col">商品名稱</th>
						  <th scope="col">數量</th>
						  <th scope="col">總金額</th>
						  <th scope="col">商品賣家</th>
						</tr>
					  </thead>
					  <tbody>
						@foreach($order->orderDetails()->get() as $orderDetail)
							<tr>
							  <th scope="row">{{$orderDetail->id}}</th>
							  <td><img src="{{$orderDetail->product->photo_url}}" width="64"></td>
							  <td>{{$orderDetail->product->name}}</td>
							  <td><input style="width:100px;" type="number" value="{{$orderDetail->amount}}" readonly /></td>
							  <td data-price="{{$orderDetail->product->price}}">${{$orderDetail->product->price * $orderDetail->amount}}</td>
							  <td>{{$orderDetail->product->seller->user->name}}</td>
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
						</tr>
					  </tfoot>
					</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
