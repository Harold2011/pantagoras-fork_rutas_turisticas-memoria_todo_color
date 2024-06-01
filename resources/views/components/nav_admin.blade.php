<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
            <img src="{{ asset('storage/img/logo.png') }}"/>
        </a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Panel de control
        </a>
        <a href="{{ route('galleryAdmin') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-images mr-3"></i>
            Galeria
        </a>
        <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-shopping-cart mr-3"></i>
            Tienda
        </a>
        <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-envelope mr-3"></i>
            Mensajes
        </a>
        <a href="{{ route('usersIndex') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-user mr-3"></i>
            Usuarios
        </a>
    </nav>
</aside>