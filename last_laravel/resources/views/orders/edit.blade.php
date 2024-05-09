@extends('layouts.app')

@section('content')

<h1>注文情報編集</h1>

@include('commons.flash')
<form action="{{ route('orders.update', $order) }}" method="post">
    @csrf
    @method('put')
    <dl>
        <dt>注文主</dt>
        <dd>{{ $order->customer->id }} : {{ $order->customer->name }}</dd>
        <dt>注文商品</dt>
        <dd>{{ $order->product->id }} : {{ $order->product->name }}（{{ $order->product->price }}円）</dd>
        <dt>数量</dt>
        <dd><input type="number" name="count" value="{{ old('count', $order->count) }}" placeholder="個数を入力"></dd>
        <dt>金額</dt>
        <dd><input type="number" name="amount" value="{{ old('amount', $order->amount) }}" placeholder="合計金額を入力"></dd>
        <dt>発送日</dt>
        <dd><input type="date" name="shipped_at" value="{{ old('shipped_at', $order->shipped_at ? $order->shipped_at->format('Y-m-d') : '') }}" placeholder="年/月/日"></dd>
    </dl>

    <button type="submit" class="btn btn-success">注文情報更新</button>

</form>
<hr>
<a href="" onclick="deleteData()">削除</a>
@include('commons.delete', ['_route' => 'orders.destroy', '_model' => $order])
@endsection
