<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('商品列表') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="mt-4">商品管理</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">新增商品</li>
                    </ol>
                <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!-- create.blade.php -->
                <form action="{{ route('products.store')}}" method="post">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">商品名稱</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="請輸入商品名稱">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">商品規格</label>
                        <input id="format" name="format" type="text" class="form-control" placeholder="請輸入商品規格">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">商品內容</label>
                        <textarea id="description" name="description" class="form-control" rows="10" placeholder="請輸入商品內容"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">商品明細</label>
                        <input id="is_display" name="is_display" type="text" class="form-control" placeholder="是否發布">
                        <input id="photo_url" name="photo_url" type="text" class="form-control" placeholder="請輸入商品照片連結">
                        <input id="price" name="price" type="text" class="form-control" placeholder="請輸入商品價格">
                        <input id="amount" name="amount" type="text" class="form-control" placeholder="請輸入商品數量">
                        <input id="category_id" name="category_id" type="text" class="form-control" placeholder="分類ID">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary btn-sm" type="submit">儲存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-seller-layout>
