<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel E-commerce DW')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: sans-serif; }
        .container { max-width: 1000px; margin: 20px auto; padding: 0 15px; }
        nav ul { list-style: none; padding: 0; margin: 0 0 20px 0; display: flex; gap: 15px; border-bottom: 1px solid #ccc; padding-bottom: 10px; }
        nav a { text-decoration: none; color: #007bff; }
        nav a:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .pagination { margin-top: 20px; }
        h1, h2 { margin-bottom: 15px; }
        .details-section { margin-bottom: 20px; padding: 15px; border: 1px solid #eee; border-radius: 5px; }
        .details-section h2 { margin-top: 0; }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <li><a href="{{ route('customers.index') }}">Customers</a></li>
                <li><a href="{{ route('orders.index') }}">Orders</a></li>
            </ul>
        </nav>

        <h1>@yield('title')</h1>

        @yield('content')
    </div>
</body>
</html>
