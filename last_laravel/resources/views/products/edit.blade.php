@extends('layouts.app')

@section('content')

<h1>商品情報編集</h1>
@include('commons.flash')
<form action="{{ route('products.update', $product) }}" method="post">
    @csrf
    @method('put')
    @include('products.form')
    <button class="btn btn-primary" type="submit">更新する</button>
</form>

@endsection
