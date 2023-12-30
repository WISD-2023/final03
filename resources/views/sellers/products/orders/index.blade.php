<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('商品 '.$product_name.' 所有進行中訂單') }}
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
                                <th scope="col">商品數</th>
                                <th scope="col">更新日期</th>
                                <th scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderDetails as $data)
                                @if($data->order->status == 0)
                                    <tr>
                                        <th scope="row">{{$data->order->no}}</th>
                                        <th>{{$data->amount}}</th>
                                        <th>{{$data->updated_at}}</th>
										<th><a class="btn btn-primary" href="{{route('sellers.orders.show', ['order'=>$data->order->id])}}">檢視明細</a></th>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-seller-layout>

