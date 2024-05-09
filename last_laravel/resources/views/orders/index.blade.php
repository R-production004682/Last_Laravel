@extends('layouts.app')

@section('content')

<h1>注文一覧</h1>
<p>
    <a class="btn{{ request('unship')?' btn-success' : '' }}" href="{{ route('orders.index', ['unship' => request('unship')?'':1]) }}">未発送</a>
</p>
@include('commons.orders')

@endsection
