<table class="table">
    <thead>
        <tr>

            <th>注文ID</th>
            <th>編集</th>
            <th>注文日</th>
            <th>顧客</th>
            <th>商品</th>
            <th>数量</th>
            <th>金額</th>
            <th>発送</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>

                <th>{{ $order->id }}</th>
                <td><a class="btn btn-primary" href="{{ route('orders.edit', $order) }}">編集</a></td>
                <td>{{ $order->created_at->format('Y年m月d日') }}</td>
                <td><a href="{{ route('customers.show', $order->customer_id) }}">{{ $order->customer->name }}</a></td>
                <td><a href="{{ route('products.show', $order->product_id) }}">{{ $order->product->name }}</a></td>
                <td class="num">{{ $order->count }}</td>
                <td class="num">{{ $order->amount }}</td>
                <td>
                    @if ($order->shipped_at)
                        {{ $order->shipped_at->format('Y年m月d日')}}
                    @else
                        <a href="" onclick="shipping({{ $order->id }})" class="btn btn-success">発送済にする</a>
                    @endif
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
{{ $orders->appends(Request::all())->links()}}

<form action="{{ route('orders.shipping') }}" id="shipping-form" method="post">
    @csrf
    <input type="hidden" id="order-id" name="order_id">
</form>
<script>
    function shipping(order_id) {
        event.preventDefault();
        if (window.confirm('発送済みにしますか？')) {
            var input = document.querySelector('#order-id').value = order_id;
            document.querySelector('#shipping-form').submit();
        }
    }
</script>
