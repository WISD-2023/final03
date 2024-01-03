<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('page-title', '商品 '.$product_name.' 的評論')
            {{ __('商品 '.$product_name.' 的評論') }}
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
                            <th scope="col">買家</th>
                            <th scope="col">內容</th>
                            <th scope="col">更新時間</th>
                            <th scope="col">評價</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr data-id="{{$comment->id}}">
                                <th scope="row">{{$comment->id}}</th>
                                <td>{{$comment->user->name}}</td>
                                <td>{{$comment->description}}</td>
                                <td>{{$comment->updated_at}}</td>
                                <td>{{$comment->like_score}} / 5</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-seller-layout>
