<!-- Componente del menú (nav_landing.blade.php) -->
<nav>
    <ul class="md:flex items-center justify-between text-base text-white pt-4 md:pt-0 hidden md:flex" id="menu">
        <li><a class="md:p-4 py-3 px-0 block" href="{{ route('welcome') }}">Inicio</a></li>
        <li><a class="md:p-4 py-3 px-0 block" href="{{ route('gallery') }}">Galería</a></li>
        <li><a class="md:p-4 py-3 px-0 block" href="{{ route('indexLanding') }}">Rutas</a></li>
        <li><a class="md:p-4 py-3 px-0 block" href="{{ route('storeUser') }}">Tienda</a></li>
        <li><a class="md:p-4 py-3 px-0 block" href="{{ route('contacto.index') }}">Contáctenos</a></li>
        @auth
            <li><a class="md:p-4 py-3 px-0 block" href="{{ route('dashboard') }}">Regresar al panel</a></li>
            <li><a class="md:p-4 py-3 px-0 block" href="{{ route('viewCart') }}"><img src="{{ asset('storage/img/cart-shopping-solid.svg') }}" class="h-5"></a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="md:p-4 py-3 px-0 block bg-transparent text-white border-0">Cerrar sesión</button>
                </form>
            </li>
        @else
            <li><a class="md:p-4 py-3 px-0 block" href="{{ route('login') }}">Iniciar sesión</a></li>
        @endauth
    </ul>

    <!-- Menú desplegable para móviles -->
    <div class="md:hidden">
        <button id="menu-toggle" class="text-white">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
        <ul id="mobile-menu" class="hidden flex-col text-white space-y-2 mt-2">
            <li><a class="p-4 block" href="{{ route('welcome') }}">Inicio</a></li>
            <li><a class="p-4 block" href="{{ route('gallery') }}">Galería</a></li>
            <li><a class="p-4 block" href="{{ route('indexLanding') }}">Rutas</a></li>
            <li><a class="p-4 block" href="{{ route('storeUser') }}">Tienda</a></li>
            <li><a class="p-4 block" href="{{ route('contacto.index') }}">Contáctenos</a></li>
            @auth
                <li><a class="p-4 block" href="{{ route('dashboard') }}">Regresar al panel</a></li>
                <li><a class="p-4 block" href="{{ route('viewCart') }}"><img src="{{ asset('storage/img/cart-shopping-solid.svg') }}" class="h-5"></a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left p-4 bg-transparent text-white border-0">Cerrar sesión</button>
                    </form>
                </li>
            @else
                <li><a class="p-4 block" href="{{ route('login') }}">Iniciar sesión</a></li>
            @endauth
        </ul>
    </div>
</nav>
