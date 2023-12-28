<!-- 這是一個簡單的 Blade View 範例，你可以根據你的需求進行調整 -->
<h2>所有訂單收入</h2>

<table>
    <thead>
        <tr>
            <th>訂單編號</th>
            <th>顧客姓名</th>
            <th>訂單金額</th>
            <!-- 其他相關欄位 -->
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->total_amount }}</td>
                <!-- 其他相關欄位 -->
            </tr>
        @endforeach
    </tbody>
</table>

<p>總收入: {{ $totalIncome }}</p>
