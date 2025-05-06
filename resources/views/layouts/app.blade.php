<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel E-commerce DW')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>        body { font-family: sans-serif; }
        .container { max-width: 1000px; margin: 20px auto; padding: 0 15px; }
        nav ul { list-style: none; padding: 0; margin: 0 0 20px 0; display: flex; padding-bottom: 10px; }
        nav li { margin-right: 15px; }
        nav a { text-decoration: none; color: #007bff; }
        nav a:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }        /* Clean, modern pagination styles */
        .pagination-info {
            margin-bottom: 15px;
            color: #666;
            font-size: 14px;
            text-align: center;
        }
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 25px 0 15px;
        }
        .pagination li {
            margin: 0 4px;
        }
        .pagination a, 
        .pagination .active, 
        .pagination .disabled,
        .pagination .dots {
            display: inline-block;
            padding: 8px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            color: #3490dc;
            text-align: center;
            text-decoration: none;
            background: #fff;
            min-width: 38px;
            font-size: 14px;
        }
        .pagination a:hover {
            background-color: #f8fafc;
            border-color: #cbd5e0;
        }
        .pagination .active {
            background-color: #3490dc;
            border-color: #3490dc;
            color: white;
            font-weight: 600;
        }
        .pagination .disabled {
            color: #a0aec0;
            cursor: not-allowed;
        }
        .pagination .dots {
            border: none;
            background: none;
        }
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
