<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
			@section('page-title', '所有已取消訂單')
            {{ __('所有已取消訂單') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 m-overflow">
					<table class="table">
					  <thead>
						<tr>
						  <th scope="col">訂單序號</th>
						  <th scope="col">賣家</th>
						  <th scope="col">商品數</th>
						  <th scope="col">更新日期</th>
						  <th scope="col">操作</th>
						</tr>
					  </thead>
					  <tbody>
						@foreach($orders as $order)
							<tr>
							  <th scope="row">{{$order->no}}</th>
							  <th>{{$order->seller->user->name}}</th>
							  <th>{{$order->orderDetails()->count()}}</th>
							  <th>{{$order->updated_at}}</th>
							  <td>
								<a class="btn btn-success" href="{{route('users.orders.show', ['order'=>$order->id])}}">檢視明細</a>
							  </td>
							</tr>
						@endforeach
					  </tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
