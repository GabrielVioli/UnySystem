<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Produtos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <nav class="bg-blue-600 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-2xl font-bold hover:text-gray-200">UniSystem</a>
            
            <div class="flex items-center space-x-4">
                @auth
                    <span class="text-blue-200 text-sm">Olá, {{ Auth::user()->name }}</span>
                    <a href="/produto/create" class="text-white hover:bg-blue-700 px-3 py-2 rounded transition">Novo Produto</a>
                    
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded transition text-sm">Sair</button>
                    </form>
                @else
                    <a href="/login" class="text-white hover:text-gray-200">Login</a>
                    <a href="/register" class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-gray-100 transition">Registrar</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 px-4">
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

</body>
</html>