<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">
    <!-- Sidebar -->
    @include('components.nav_admin')

    <div class="w-full flex flex-col h-screen">
        <!-- Header -->
        @include('components.nav_head_admin')

        <div class="flex-grow flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Panel de control, Bienvenido {{Auth::user()->name}}</h1>
                @role('admin')
                    <div class="flex flex-wrap mt-6">
                        <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                            <p class="text-xl pb-3 flex items-center">
                                <i class="fas fa-chart-bar mr-3"></i> Ventas por Producto
                            </p>
                            <div class="p-6 bg-white">
                                <canvas id="salesChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                        
                        <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-6 lg:mt-0">
                            <p class="text-xl pb-3 flex items-center">
                                <i class="fas fa-list mr-3"></i> Lista de ventas
                            </p>
                            <div class="bg-white overflow-auto">
                                <table class="min-w-full bg-white">
                                    <thead class="bg-[#34482D] text-white">
                                        <tr>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nombre</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700">
                                        @foreach ($productSales as $sale)
                                        <tr>
                                            <td class="w-1/3 text-left py-3 px-4">{{ $sale->name }}</td>
                                            <td class="text-left py-3 px-4">{{ $sale->total_sales }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endrole
                @role('user')
                <div class="flex flex-wrap mt-6 justify-center">
                    <div class="w-full lg:w-1/2">
                        <div class="relative">
                            <img src="{{ asset('storage/img/background.jpg') }}" alt="Banner" class="w-full h-auto object-cover rounded-lg">
                            <div class="absolute inset-0 bg-gray-700 bg-opacity-50 flex items-center justify-center rounded-lg">
                                <h2 class="text-white text-3xl font-bold">Bienvenido a pantágoras.</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
                @role('artista')
                <div class="flex flex-wrap mt-6 justify-center">
                    <div class="w-full lg:w-1/2">
                        <div class="relative">
                            <img src="{{ asset('storage/img/background.jpg') }}" alt="Banner" class="w-full h-auto object-cover rounded-lg">
                            <div class="absolute inset-0 bg-gray-700 bg-opacity-50 flex items-center justify-center rounded-lg">
                                <h2 class="text-white text-3xl font-bold">Bienvenido a pantágoras.</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole

            </main>

            <!-- Footer -->
            <footer class="w-full bg-white text-right p-4">
                <a target="_blank" href="" class="underline">Pantágoras 2024.</a>
            </footer>
        </div>
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <!-- Gráfico de Ventas por Producto -->
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($productSales->pluck('name')),
                datasets: [{
                    label: 'Ventas Totales',
                    data: @json($productSales->pluck('total_sales')),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
