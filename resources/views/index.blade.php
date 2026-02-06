@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Lista de Produtos</h1>
    
    <div class="flex items-center space-x-3"> @auth
            <form action="/produto/delete-all" method="POST" onsubmit="return confirm('TEM CERTEZA? Isso apagará TODOS os produtos do banco de dados!');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition shadow-md flex items-center">
                    🗑️ Excluir Tudo
                </button>
            </form>

            <a href="/produto/create" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition shadow-md">
                + Adicionar
            </a>
        @endauth
    </div>
</div>

<div class="bg-white shadow-md rounded my-6 overflow-x-auto">

<div class="bg-white shadow-md rounded my-6 overflow-x-auto">
    <table class="min-w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Nome</th>
                <th class="py-3 px-6 text-left">Descrição</th>
                <th class="py-3 px-6 text-center">Preço</th>
                @auth <th class="py-3 px-6 text-center">Ações</th> @endauth
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @forelse($produtos as $produto)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap font-bold">{{ $produto->id }}</td>
                <td class="py-3 px-6 text-left">{{ $produto->name }}</td>
                <td class="py-3 px-6 text-left">{{ Str::limit($produto->description, 50) }}</td>
                <td class="py-3 px-6 text-center">R$ {{ number_format($produto->price, 2, ',', '.') }}</td>
                @auth
                <td class="py-3 px-6 text-center">
                    <div class="flex item-center justify-center">
                        <a href="/produto/{{ $produto->id }}/edit" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            ✏️
                        </a>
                        <form action="/produto/{{ $produto->id }}/delete" method="POST" onsubmit="return confirm('Tem certeza?');">
                            @csrf
                            @method('DELETE') <button type="submit" class="w-4 transform hover:text-red-500 hover:scale-110">
                                🗑️
                            </button>
                        </form>
                    </div>
                </td>
                @endauth
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-3 px-6 text-center text-lg text-gray-500">Nenhum produto cadastrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection