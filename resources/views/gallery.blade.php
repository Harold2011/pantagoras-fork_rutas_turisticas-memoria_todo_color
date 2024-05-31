<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="relative w-full h-full bg-no-repeat bg-cover bg-center bg-shadow" style="background-image: url('{{ asset('storage/img/gallery.JPG') }}');">
        <div class="content">
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
                <div class="flex flex-col md:grid md:grid-cols-3 gap-3">
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?hanging-planters" alt="Hanging Planters" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                        Hanging Planters
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?planter-stand" alt="Planter Stand with Pots" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                        Planter Stand with Pots
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?watering-cans" alt="Watering Cans" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                        Watering Cans
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?metal-planters" alt="Metal Planters" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                        Metal Planters
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?table-top-planters" alt="Table Top Planters" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                        Table Top Planters
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?wall-mounted-stands" alt="Wall Mounted Stands" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                        Wall Mounted Stands
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?jute-plant-pots" alt="Jute Plant Pots" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                        Jute Plant Pots
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?bird-feeders" alt="Bird Feeders" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                        Bird Feeders
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?hanging-birds" alt="Hanging Birds" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover-bg-opacity-60 transition">
                        Hanging Birds
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?garden-sticks" alt="Garden Sticks" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                        Garden Sticks
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?garden-tray-miniatures" alt="Garden Tray Miniatures" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover-bg-opacity-60 transition">
                        Garden Tray Miniatures
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?garden-tool-set" alt="Garden Tool Set" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover-bg-opacity-60 transition">
                        Garden Tool Set
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?candle-stand" alt="Candle Stand" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover-bg-opacity-60 transition">
                        Candle Stand
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?lanterns" alt="Lanterns" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover-bg-opacity-60 transition">
                        Lanterns
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?chimes" alt="Chimes" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover-bg-opacity-60 transition">
                        Chimes
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?cage" alt="Cage" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover-bg-opacity-60 transition">
                        Cage
                      </p>
                    </div>
                    <div class="relative rounded overflow-hidden">
                      <img src="https://source.unsplash.com/400x300/?bird-house-hanging" alt="Bird House Hanging" class="w-full">
                      <p
                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover-bg-opacity-60 transition">
                        Bird House Hanging
                      </p>
                    </div>
                  </div>
            </main> 
        </div>
    </div>
</body>
</html>