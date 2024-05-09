<dl>
    <dt>商品名</dt>
    <dd>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
    </dd>
    <dt>価格</dt>
    <dd>
        <input type="text" name="price" value="{{ old('price', $product->price) }}">
    </dd>
</dl>
