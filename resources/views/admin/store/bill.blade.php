<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <!-- Tailwind -->
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">
    @include('components.nav_admin')
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        @include('components.nav_head_admin')
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Factura</h1>
                <div class="w-full mt-12">
                    <div class="bg-white overflow-auto p-10">
                        <h2 class="text-2xl text-black pb-4">ID Factura: {{ $bill->id }}</h2>
                        <p class="text-gray-700"><strong>ID Transacción:</strong> {{ $bill->id_transaction }}</p>
                        <p class="text-gray-700"><strong>Referencia de Venta:</strong> {{ $bill->ref_sale }}</p>
                        <p class="text-gray-700"><strong>Referencia de Transacción:</strong> {{ $bill->ref_transaction }}</p>
                        <p class="text-gray-700"><strong>Total:</strong> ${{ $bill->total }}</p>
                        <p class="text-gray-700"><strong>Entidad:</strong> {{ $bill->entity }}</p>
                        <p class="text-gray-700"><strong>Fecha:</strong> {{ $bill->date }}</p>
                        <h3 class="text-xl text-black pt-6 pb-4">Productos:</h3>
                        <ul class="list-disc list-inside">
                            @foreach($bill->buyBills as $buyBill)
                            <li>{{ $buyBill->buys->product->name }} - Total: ${{ $buyBill->buys->total }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('orders') }}" class="bg-[#120A33] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Volver a Pedidos</a>
                    </div>
                </div>
            </main>
            <footer class="w-full bg-white text-right p-4">
                <a target="_blank" href="" class="underline">Memoria todo color 2024.</a>.
            </footer>
        </div>
    </div>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>
</html>
