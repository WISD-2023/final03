<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('此商品 '.$product_name.'('.$product_id.') 所有 待出貨 訂單') }} --}}
            {{ __('商品列表') }}
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
                                <th scope="col">圖片</th>
                                <th scope="col">名稱</th>
                                <th scope="col">分類</th>
                                <th scope="col">庫存</th>
                                <th scope="col">更新時間</th>
                                <th scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $data)
                                <tr data-id="{{$data->id}}">
                                    <th scope="row">{{$data->id}}</th>
                                    <td><img src="{{$data->photo_url}}" width="64"></td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->category->name}}</td>
                                    <td>{{$data->amount}}</td>
                                    <td>{{$data->updated_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-seller-layout>
