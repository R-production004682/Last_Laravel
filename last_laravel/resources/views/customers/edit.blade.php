@extends('layouts.app')

@section('content')

<h1>顧客情報編集</h1>
@include('commons.flash')
<form action="{{ route('customers.update', $customer) }}" method="post">
    @csrf
    @method('put')
    <dl>
        <dt>顧客名</dt>
        <dd>
            <input type="text" name="name" value="{{ old('name', $customer->name) }}">
        </dd>
    </dl>
    <button class="btn btn-primary" type="submit">更新する</button>
    ｜
    <a href="{{ route('customers.show', $customer) }}">キャンセル</a>
</form>


@endsection
