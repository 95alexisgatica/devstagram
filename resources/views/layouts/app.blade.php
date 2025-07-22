<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titulo')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between">
                <h1 class="text-3xl font-black">
                    Devstagram
                </h1>

                @auth
                    <nav>
                        <a href="/" class="font-bold text-gray-600 text-sm">
                            Hola: 
                            <span class="font-normal">
                                {{ auth()->user()->username}}
                            </span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline-block ml-2">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                                Cerrar Sesión
                            </button>
                        </form>
                    </nav>
                @endauth

                @guest
                    <nav>
                        <a href="/login" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                        <a href="{{ route('register')}}" class="font-bold uppercase text-gray-600 text-sm">Crear cuenta</a>
                    </nav>
                @endguest
            </div>
        </header>
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="text-center p-5 text-gray-500 font-bold">
            Alexio - todos los derechos reservados {{now()->year}}
        </footer>
    </body>
</html>
