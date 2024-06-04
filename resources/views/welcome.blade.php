<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen overflow-hidden">
    <div class="relative w-full h-full bg-no-repeat bg-cover bg-center bg-shadow" style="background-image: url('{{ asset('storage/img/background.gif') }}');">
        <div class="content">
            <header class="lg:px-16 px-4 flex flex-wrap items-center py-4">
                <div class="flex-1 flex justify-between items-center">
                    <a href="#" class="text-4xl font-extrabold text-white">
                        <img src="{{ asset('storage/img/logo.png') }}" class="h-20">
                    </a>
                </div>
                <label for="menu-toggle" class="pointer-cursor md:hidden block">
                    <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <title>menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </label>
                <input class="hidden" type="checkbox" id="menu-toggle" />
                <div class="hidden md:flex md:items-center md:w-auto w-full" id="menu">
                    @include('components/nav_landing')
                </div>
            </header>

            <div class="w-[90%] mx-auto h-full flex items-center justify-between py-10">
                <div class="lg:w-[20%]">
                    <div class="sm:text-6xl xs:text-5xl text-white text-left uppercase">
                        <h1 class="font-mono">Descubre San Carlos Con Realidad Aumentada</h1>
                    </div>
                    <div class="w-full flex items-center justify-between mt-10 py-1 px-4 uppercase bg-yellow-500 rounded-sm shadow-md">
                        <h3 class="text-white text-lg font-semibold">Productos</h3>
                        <div class="w-[40%] flex items-center text-gray-700 text-4xl gap-0">
                            <hr class="w-full border border-gray-700 relative -right-3" />
                            <ion-icon name="chevron-forward"></ion-icon>
                        </div>
                    </div>
                </div>

                <div>
                    <ul class="text-2xl text-gray-700">
                        <li class="px-1 bg-white/50 rounded-full">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </li>
                        <li class="px-1 bg-white/50 rounded-full mt-2">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </li>
                        <li class="px-1 bg-white/50 rounded-full mt-2">
                            <ion-icon name="logo-whatsapp"></ion-icon>
                        </li>
                        <li class="px-1 bg-white/50 rounded-full mt-2">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
