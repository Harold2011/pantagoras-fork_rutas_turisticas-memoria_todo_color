<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artistas</title>
    @vite('resources/css/app.css')
    <style>
        .background-fixed {
            background-image: url('{{ asset('storage/img/fondo.png') }}');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
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
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="text-2xl font-medium title-font mb-4 text-gray-100">Conoce los artistas que pintan sancarlos</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-100">Sigue las redes sociales de estos artistas y enterate de lo que hacen.</p>
                      </div>
                      <div class="flex flex-wrap -m-4">
                        @foreach ($user as $users)
                            <div class="p-4 lg:w-1/4 md:w-1/2">
                            <div class="h-full flex flex-col items-center text-center">
                                <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="{{ asset('storage/'.$users->profile_photo_path) }}">
                                <div class="w-full">
                                <h2 class="title-font font-medium text-lg text-gray-100">{{ $users->name }}</h2>
                                <h3 class="text-gray-100 mb-3">Biografia</h3>
                                <p class="mb-4 text-gray-100">{{ $users->description }}</p>
                                <span class="inline-flex">
                                    @if(!empty($users->instagram))
                                        <a href="{{ $users->instagram }}" target="_blank" class="text-gray-100">
                                            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M3 16V8C3 5.23858 5.23858 3 8 3H16C18.7614 3 21 5.23858 21 8V16C21 18.7614 18.7614 21 16 21H8C5.23858 21 3 18.7614 3 16Z" stroke="currentColor" stroke-width="1.5"/>
                                            </svg>
                                        </a>
                                    @endif
                                    @if(!empty($users->facebook))
                                        <a href="{{ $users->facebook }}" target="_blank" class="text-gray-100">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                            </svg>
                                        </a>
                                    @endif
                                    @if(!empty($users->youtube))
                                        <a href="{{ $users->youtube}}" target="_blank" class="ml-2 text-gray-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-youtube">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
                                                <path d="M10 9l5 3l-5 3z" />
                                              </svg>
                                        </a>
                                    @endif


                                </span>
                                </div>
                            </div>
                            </div>
                        @endforeach
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
