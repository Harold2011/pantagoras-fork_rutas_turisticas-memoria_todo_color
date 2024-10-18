<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeria</title>
    @vite('resources/css/app.css')
    <style>
        .background-fixed {
            background-image: url('{{ asset('storage/img/fondo3.jpg') }}');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .overlay {
            background-color: rgba(50, 50, 50, 0.7);
        }
    </style>
</head>
<body class="h-screen overflow-hidden">
    <div class="background-fixed fixed inset-0"></div>
    <div class="relative w-full h-full overlay">
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
                <div class="flex flex-col items-center justify-center w-full mb-20 px-8 md:px-16">
                    <h1 class="text-2xl font-medium title-font mb-4 text-gray-100 text-center">
                        Explora la esencia de la aventura, la naturaleza y la cultura a través de nuestra galería: un viaje visual que te conecta con la belleza del mundo y las historias que cada rincón tiene para contar.
                    </h1>
                </div>

                <!-- Sección combinada para videos y galería -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                    <!-- Videos destacados -->
                    <a href="https://www.youtube.com/watch?v=rdPKvCW2yME" class="relative rounded overflow-hidden shadow-lg">
                        <iframe class="w-full h-64" src="https://www.youtube.com/embed/rdPKvCW2yME" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </a>
                    <a href="https://www.youtube.com/watch?v=nR9mNvd86B8" class="relative rounded overflow-hidden shadow-lg">
                        <iframe class="w-full h-64" src="https://www.youtube.com/embed/nR9mNvd86B8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </a>
                    <a href="https://www.youtube.com/watch?v=1pYH6FndU7Q" class="relative rounded overflow-hidden shadow-lg">
                        <iframe class="w-full h-64" src="https://www.youtube.com/embed/1pYH6FndU7Q" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </a>
                    <a href="https://www.youtube.com/watch?v=FlVOrEAn9R8" class="relative rounded overflow-hidden shadow-lg">
                        <iframe class="w-full h-64" src="https://www.youtube.com/embed/FlVOrEAn9R8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </a>

                    <!-- Sección de Galería -->
                    @foreach ($gallery as $gallerys)
                    <a href="{{ route('viewGallery', $gallerys->id) }}">
                        <div class="relative rounded overflow-hidden shadow-lg bg-white">
                            <img src="{{ asset('storage/'.$gallerys->url) }}" alt="Gallery Image">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col items-center justify-center text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                                <p class="text-2xl">{{ $gallerys->name }}</p>
                                <p class="text-lg">{{ $gallerys->description }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
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
