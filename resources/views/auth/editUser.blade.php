@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden md:max-w-lg">
    <div class="md:flex">
        <div class="w-full p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Editar informações</h2>
                <a href="/" class="text-sm text-blue-500 hover:underline">Voltar</a>
            </div>

            <form action="{{ route('profile.update')}}" method="POST">
                @method('PUT')
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nome
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="name" name="name" type="text" placeholder="Novo nome" value='{{$user->name}}' required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        email
                    </label>
                    <input type="text" placeholder="Digite seu novo email" name ="email"  value='{{$user->email}}' required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="senha">
                        senha
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="senha" name="senha" type="password" placeholder="Digite sua nova senha" required>
                </div>

                <div class="flex items-center justify-end">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition"
                            type="submit">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
