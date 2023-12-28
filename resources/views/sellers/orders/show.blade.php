<!-- 這是一個簡單的 Blade View 範例，你可以根據你的需求進行調整 -->
<h2>訂單詳細資料</h2>

<p>訂單編號: {{ $order->order_number }}</p>
<p>訂單明細: <!-- 顯示訂單明細的相關資訊 --></p>
<p>訂單狀態: {{ $order->status }}</p>
<p>付款狀態: {{ $order->payment_status }}</p>
<p>貨運狀態: {{ $order->shipping_status }}</p>
<!-- 其他相關欄位 -->

<!-- 你可以根據實際需要顯示更多訂單詳細資訊 -->
