<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('page-title', '商品列表')
            {{ __('商品列表') }}
			<a class="btn btn-success" href="{{ route('sellers.products.create') }}">新增商品</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 m-overflow">
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
                                    <td style="width:380px;">
										<a class="btn btn-warning" href="{{ route('sellers.products.edit', ['product'=>$data->id]) }}">修改</a>
										<form class="delete d-inline-block" onsubmit="return confirm('確定刪除？');" action="{{route('sellers.products.destroy',['product'=>$data->id])}}" method="post">
											@csrf
											@method('DELETE')
											<button class="btn btn-danger" type="submit">刪除</button>
										</form>
										<a class="btn btn-primary" href="{{ route('sellers.comments.index', ['product'=>$data->id]) }}">查看評論</a>
										<div class="dropdown d-inline-block">
										  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											查看訂單
										  </button>
										  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="{{ route('sellers.products.orders.index', ['product'=>$data->id]) }}">進行中訂單</a>
											<a class="dropdown-item" href="{{ route('sellers.products.orders.done', ['product'=>$data->id]) }}">待出貨訂單</a>
											<a class="dropdown-item" href="{{ route('sellers.products.orders.cancel', ['product'=>$data->id]) }}">已取消訂單</a>
										  </div>
										</div>
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
