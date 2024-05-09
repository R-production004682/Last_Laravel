@extends('layouts.app')

@section('content')

<h1>商品新規登録</h1>
@include('commons.flash')
<form action="{{ route('products.store') }}" method="post">
    @csrf
    @include('products.form')
    <button class="btn btn-primary" type="submit">登録する</button>
</form>

@endsection
