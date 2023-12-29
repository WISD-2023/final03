<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('此商品 '.$product_name.'('.$product_id.') 所有 待出貨 訂單') }} --}}
            {{ __('此商品 '.$product_name.' 所有 取消 訂單') }}
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderDetails as $data)
                                @if($data->order->status == -1)
                                    <tr>
                                        <th scope="row">{{$data->order->no}}</th>
                                        <th>{{$data->amount}}</th>
                                        <th>{{$data->updated_at}}</th>
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
