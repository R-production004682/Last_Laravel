@extends('layouts.app')

@section('content')

<h1>商品情報詳細</h1>

<dl>
    <dt>商品名</dt>
    <dd>{{ $product->name }}</dd>
    <dt>価格</dt>
    <dd>{{ $product->price }} 円</dd>
</dl>
<a href="{{ route('products.edit', $product) }}">編集</a>
｜
<a href="" onclick="deleteData()">削除</a>
@include('commons.delete', ['_route' => 'products.destroy', '_model' => $product])
<hr>
<h2>注文履歴</h2>
@include('commons.orders')
@endsection
