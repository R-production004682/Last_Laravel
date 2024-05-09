@extends('layouts.app')

@section('content')

<h1 class="product">商品一覧</h1>
<p><a href="{{ route('products.create') }}">＋新規登録</a></p>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>商品名</th>
            <th>価格</th>
            <th>注文件数</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <th>{{ $product->id }}</th>
                <td><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></td>
                <td class="num">{{ $product->price }}</td>
                <td class="num">{{ $product->orders_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $products->appends(Request::all())->links() }}
@endsection
