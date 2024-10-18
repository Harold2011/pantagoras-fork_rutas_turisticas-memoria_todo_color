<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    @vite('resources/css/app.css')
    <style>
        .background-image {
            background-image: url('{{ asset('storage/img/background.jpg') }}');
            background-size: cover; /* La imagen cubrirá toda la pantalla */
            background-position: center; /* La imagen estará centrada */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-attachment: fixed; /* La imagen de fondo se mantendrá fija mientras se desplaza el contenido */
        }
        /* Superposición con color humo más fuerte */
        .overlay {
            background-color: rgba(50, 50, 50, 0.7); /* Gris oscuro con opacidad del 70% */
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="relative w-full min-h-screen bg-shadow background-image overlay">
        <div class="content">
            <header class="lg:px-16 px-4 flex flex-wrap items-center py-4">
                <div class="flex-1 flex justify-between items-center">
                    <a href="#" class="text-4xl font-extrabold text-white">
                        <img src="{{ asset('storage/img/logo.png') }}" class="h-20">
                    </a>
                </div>
                @include('components.nav_landing')
            </header>
            <div class="w-[90%] mx-auto h-full flex items-center justify-between py-10">
                <div class="lg:w-[20%]">
                    <div class="sm:text-6xl xs:text-5xl text-white text-left uppercase">
                        <h1 class="font-mono">Pantágoras, Aventura ancestral y biodiversa.</h1>
                    </div>
                </div>

                <div>
                    <ul class="text-2xl text-gray-700">
                        <li class="px-1 bg-white/50 rounded-full">
                            <a href="https://www.facebook.com/pantagoras.cultura/" target="_blank">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>
                        <a href="https://www.instagram.com/nature_pantagoras/?__d=11" target="_blank">
                            <li class="px-1 bg-white/50 rounded-full mt-2">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </li>
                        </a>
                        <a href="https://wa.me/573117034930?text=Hola%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s%20sobre%20sus%20productos" target="_blank">
                            <li class="px-1 bg-white/50 rounded-full mt-2">
                                <ion-icon name="logo-whatsapp"></ion-icon>
                            </li>
                        </a>                        
                    </ul>
                </div>
            </div>
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
