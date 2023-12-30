<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('所有待出貨訂單') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
					<table class="table">
					  <thead>
						<tr>
						  <th scope="col">訂單序號</th>
						  <th scope="col">買家</th>
						  <th scope="col">商品數</th>
						  <th scope="col">更新日期</th>
						  <th scope="col">操作</th>
						</tr>
					  </thead>
					  <tbody>
						@foreach($orders as $order)
							<tr>
							  <th scope="row">{{$order->no}}</th>
							  <th>{{$order->user->name}}</th>
							  <th>{{$order->orderDetails()->count()}}</th>
							  <th>{{$order->updated_at}}</th>
							  <td>
								<a class="btn btn-primary" href="{{route('sellers.orders.show', ['order'=>$order->id])}}">檢視明細</a>
								<form class="d-inline-block" action="{{route('sellers.orders.update', ['order'=>$order->id])}}" method="post">
									@csrf
									@method('PATCH')
									<button class="btn btn-warning" type="submit">標示為已出貨</button>
								</form>
							  </td>
							</tr>
						@endforeach
					  </tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</x-seller-layout>
