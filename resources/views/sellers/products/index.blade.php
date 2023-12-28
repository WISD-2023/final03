<!-- 這是一個簡單的 Blade View 範例，你可以根據你的需求進行調整 -->
<h2>賣家商品列表</h2>

<table>
    <thead>
        <tr>
            <th>商品名稱</th>
            <th>價格</th>
            <!-- 其他相關欄位 -->
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <!-- 其他相關欄位 -->
            </tr>
        @endforeach
    </tbody>
</table>
