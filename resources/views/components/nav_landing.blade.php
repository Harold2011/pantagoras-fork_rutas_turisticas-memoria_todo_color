<nav>
    <ul class="md:flex items-center justify-between text-base text-white pt-4 md:pt-0">
        <li><a class="md:p-4 py-3 px-0 block" href="{{ route('welcome') }}">Inicio</a></li>
        <li><a class="md:p-4 py-3 px-0 block" href="{{ route('gallery') }}">Galería</a></li>
        <li><a class="md:p-4 py-3 px-0 block" href="{{ route('artists') }}">Artistas</a></li>
        <li><a class="md:p-4 py-3 px-0 block" href="{{ route('contacto.index') }}">Contactenos</a></li>
        <li><a class="md:p-4 py-3 px-0 block" href="{{ route('indexLanding') }}">Rutas</a></li>
        <li><a class="md:p-4 py-3 px-0 block" href="{{ route('storeUser') }}">Tienda</a></li>
        @auth
            <li><a class="md:p-4 py-3 px-0 block" href="{{ route('viewCart') }}"><img src="{{ asset('storage/img/cart-shopping-solid.svg') }}" class="h-5"></a></li>
        @else
            <li><a class="md:p-4 py-3 px-0 block" href="{{ route('login') }}">Iniciar sesión</a></li>
        @endauth
    </ul>
</nav>
