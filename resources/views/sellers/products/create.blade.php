<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('page-title', '新增商品')
            {{ __('新增商品') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('sellers.products.store')}}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        <div>
                            <x-input-label for="name" :value="__('商品名稱')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                        </div>
						
                        <div>
                            <x-input-label for="description" :value="__('商品描述')" />
                            <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="description" name="description" rows="5"></textarea>
                        </div>
						
	
						<div class="row">
							<div class="col">
								<x-input-label class="inline-block w-full" for="amount" :value="__('庫存')" />
								<x-text-input min="1" value="1" id="amount" name="amount" type="number" class="mt-1 inline-block w-full" required />
							</div>
							<div class="col">
								<x-input-label class="inline-block w-full" for="format" :value="__('規格')" />
								<x-text-input id="format" name="format" type="text" class="mt-1 inline-block w-full" required />
							</div>
						</div>
	
						<div class="row">
							<div class="col">
								<x-input-label class="inline-block w-full" for="price" :value="__('價格')" />
								<x-text-input min="1" value="1" id="price" name="price" type="number" class="mt-1 inline-block w-full" required />
							</div>
							<div class="col">
								<x-input-label class="inline-block w-full" for="photo_url" :value="__('商品圖片')" />
								<x-text-input id="photo_url" name="photo_url" type="text" class="mt-1 inline-block w-full" required />
							</div>
						</div>
						
						<div class="row">
							<div class="col">
								<x-input-label class="inline-block w-full" for="category_id" :value="__('分類')" />
								<select name="category_id" id="category_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
									@foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="col">
								<x-input-label class="inline-block w-full" for="is_display" :value="__('發布狀態')" />
								<select name="is_display" id="is_display" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
									<option value="1">發布</option>
									<option value="0" selected>未發布</option>
								</select>
							</div>
						</div>
					
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('儲存') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-seller-layout>
