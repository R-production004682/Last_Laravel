@extends('layouts.app')

@section('content')

<h1>顧客一覧</h1>
<p><a href="{{ route('customers.create') }}">＋新規登録</a></p>
<form class="search-form" action="{{ route('customers.index') }}" method="get">
    <input type="text" name="keyword" value="{{ request('keyword') }}">
    <button type="submit" class="btn">検索</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>顧客名</th>
            <th>注文</th>
            <th>注文件数</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <th>{{ $customer->id }}</th>
                <td><a href="{{ route('customers.show', $customer) }}">{{ $customer->name }}</a></td>
                <td><a href="{{ route('orders.create' ,['customer_id' => $customer->id]) }}" class="btn btn-success">注文</a></td>
                <td class="num">{{ $customer->orders_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $customers->appends(Request::all())->links() }}
@endsection
