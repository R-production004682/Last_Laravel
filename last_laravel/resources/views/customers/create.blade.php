@extends('layouts.app')

@section('content')

<h1>顧客新規登録</h1>
@include('commons.flash')
<form action="{{ route('customers.store') }}" method="post">
    @csrf
    <dl>
        <dt>顧客名</dt>
        <dd>
            <input type="text" name="name" value="{{ old('name', $customer->name) }}">
        </dd>
    </dl>
    <button class="btn btn-danger" type="submit">登録する</button>
</form>

@endsection
