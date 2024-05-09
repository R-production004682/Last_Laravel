<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body class="{{ request()->path() ? explode('/', request()->path())[0] : 'app' }}-page">
        <header>
            <div class="container">
                <a class="brand" href="/">{{ config('app.name') }}</a>
                <ul class="navigation">
                    <li class="nav-products">
                        <a href="{{ route('products.index') }}">商品一覧</a>
                    </li>
                    <li class="nav-customers">
                        <a href="{{ route('customers.index') }}">顧客一覧</a>
                    </li>
                    <li class="nav-orders">
                        <a href="{{ route('orders.index') }}">注文一覧</a>
                    </li>
                </ul>
            </div>

        </header>
        <div class="container">

            @yield('content')
        </div>

    </body>
</html>
