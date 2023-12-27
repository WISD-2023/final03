<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('購物車') }}
        </h2>
    </x-slot>
	<script>
		$(function(){
			onCountTotal();
		});
		
		function onCountTotal(){
			let total = 0;
			$('table tbody td[data-price]').each(function(){
				let money = parseInt($(this).text().replaceAll('$',''));
				total+=money;
			});

			$('table tfoot th[data-total]').text('$'+total);
		}
		function onCartChange(element, flag){
			if(flag && !element.value || !element.value || element.value < 1){
				element.value = 1;
			}
			
			
			if(element.value && element.value > 0){
				$(element).parents('tr[data-id]').find('form.update input[name="amount"]').val(element.value);
				
				let $ele = $(element).parents('tr[data-id]').find('td[data-price]');
				$ele.text("$"+$ele.data('price')*element.value);
				
				onCountTotal();
			}
		}
	</script>
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
							  <td>
								<form class="update d-inline-block" action="{{route('cart_items.update',['cart_item'=>$cart_item->id])}}" method="post">
									@csrf
									@method('PATCH')
									<input name="amount" value="{{$cart_item->amount}}" type="hidden">
									<button class="btn btn-success" type="submit">更新</button>
								</form>
								<form class="delete d-inline-block" action="{{route('cart_items.destroy',['cart_item'=>$cart_item->id])}}" method="post">
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
						</tr>
					  </tfoot>
					</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
