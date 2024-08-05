<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .background-fixed {
            background-image: url('{{ asset('storage/img/fondo.png') }}');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        .product-card img {
            object-fit: cover;
            width: 100%;
            height: 200px;
        }
        .product-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
    </style>
</head>
<body class="h-screen overflow-hidden">
    <div class="background-fixed fixed inset-0"></div>
    <div class="relative w-full h-full bg-no-repeat bg-cover bg-center bg-shadow bg-opacity-75">
        <div class="content relative z-10 h-full overflow-auto">
            <header class="lg:px-16 px-4 flex flex-wrap items-center py-4">
                <div class="flex-1 flex justify-between items-center">
                    <a href="#" class="text-4xl font-extrabold text-white">
                        <img src="{{ asset('storage/img/logo.png') }}" class="h-20">
                    </a>
                </div>
                <input class="hidden" type="checkbox" id="menu-toggle" />
                <div class="hidden md:flex md:items-center md:w-auto w-full" id="menu">
                    @include('components/nav_landing')
                </div>
            </header>
            <main>
                <div class="container px-5 py-24 mx-auto">
                    <a href="{{ route('buysPersonalized') }}">
                        <button type="button" class="m-5 w-full bg-[#120A33] text-white font-semibold py-2 rounded-lg shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Quiero realizar una compra personalizada.</button>
                    </a>
                    <div class="flex flex-wrap justify-center">
                        @foreach($products as $product)
                            <div class="w-full m-3 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 product-card">
                                <a href="{{ route('viewProduct', $product->id) }}">
                                    <img class="p-8 rounded-t-lg" src="{{ asset('storage/'.$product->url) }}" alt="product image" />
                                </a>
                                <div class="px-5 pb-5 flex flex-col flex-grow">
                                    <a href="{{ route('viewProduct', $product->id) }}">
                                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
                                    </a>
                                    <div class="flex items-center mt-2.5 mb-5 flex-grow">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-3xl font-bold text-gray-900 dark:text-white">$ {{ $product->price }}</span>
                                        <form action="{{ route('addToCart', $product->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="p-10 bg-[#120A33] text-white font-semibold py-2 rounded-lg shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Agregar al carrito +</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
