<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contactos</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .background-fixed {
            background-image: url('{{ asset('storage/img/background.jpg') }}');
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
                    @include('components/nav_landing')
            </header>
            <main>
                <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-12 mx-auto"> <!-- Ajusta el valor de py-12 para moverlo más arriba -->
                        <div class="flex flex-col text-center w-full mb-8">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-50">Contactos</h1>
                            <p class="lg:w-2/3 mx-auto text-gray-50 leading-relaxed text-base">Envianos un mensaje para contactarte.</p>
                        </div>
                        <div class="lg:w-1/2 md:w-2/3 mx-auto bg-white rounded-lg shadow-lg p-6">
                            <form action="{{ route('contacto.store') }}" method="POST">
                            <div class="flex flex-wrap -m-2">
                            
                                @csrf
                                <div class="p-2 w-1/2">
                                    <div class="relative">
                                        <label for="name" class="leading-7 text-sm text-gray-600">Nombre</label>
                                        <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                                    </div>
                                </div>
                                <div class="p-2 w-1/2">
                                    <div class="relative">
                                        <label for="email" class="leading-7 text-sm text-gray-600">Correo</label>
                                        <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                                    </div>
                                </div>
                                <div class="p-2 w-1/2">
                                    <div class="relative">
                                        <label for="number" class="leading-7 text-sm text-gray-600">Numero de contacto</label>
                                        <input type="text" id="number" name="number" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="description" class="leading-7 text-sm text-gray-600">Descripcion del mensaje</label>
                                        <textarea id="description" name="description" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" required></textarea>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <button class="flex mx-auto text-white bg-[#34482D] border-0 py-2 px-8 focus:outline-none hover:bg-[#078C03] rounded text-lg">Enviar</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
