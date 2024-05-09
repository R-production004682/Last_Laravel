@extends('layouts.app')

@section('content')

<h1>注文新規登録</h1>
<h2>{{ $customer->name }}　さんの注文</h2>
@include('commons.flash')
<form action="{{ route('orders.store') }}" method="post">
    @csrf
    <ul class="product-list">
        @foreach ($products as $product)
        <li>
            <label>
                <input type="radio" name="product_id" value="{{ $product->id }}"{{ old('product_id') == $product->id ? ' checked':''}}>
                {{ $product->name }}
                （{{ $product->price }}円）
            </label>

        </li>
        @endforeach
    </ul>
    <dl>
        <dt>注文主</dt>
        <dd>顧客ID {{ $customer->id }} : {{ $customer->name }}</dd>
        <dt>数量</dt>
        <dd><input type="number" name="count" value="{{ old('count', 1) }}" placeholder="個数を入力"></dd>
    </dl>

    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
    <button type="submit" class="btn btn-success">注文確定</button>

</form>

@endsection
