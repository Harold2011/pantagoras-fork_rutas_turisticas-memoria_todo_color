<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>galeria</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @vite('resources/css/app.css')
    <style>
        .background-fixed {
            background-image: url('{{ asset('storage/img/fondo.png') }}');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        .image-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
        .modal-image {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
        }
        .modal-content {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>
<body class="h-screen overflow-hidden" x-data="{ showModal: false, modalImage: '' }">
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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                    @foreach ($multimedia as $media)
                        <div class="relative rounded overflow-hidden shadow-lg bg-white cursor-pointer image-container"
                             @click="modalImage = '{{ asset('storage/'.$media->url) }}'; showModal = true">
                            <img src="{{ asset('storage/'.$media->url) }}" alt="Multimedia Image" class="w-full h-64 object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col items-center justify-center text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                                <p class="text-2xl">{{ $media->name }}</p>
                                <p class="text-lg">{{ $media->description }}</p>
                                <p class="text-sm mt-2">Artista: {{ $media->user->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>

    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 z-50">
        <div class="bg-white p-4 rounded-lg shadow-lg max-w-3xl w-full modal-content">
            <button @click="showModal = false" class="text-black font-bold py-2 px-4 rounded">X cerrar</button>
            <img :src="modalImage" alt="Modal Image" class="modal-image mt-4">
        </div>
    </div>
</body>
</html>
