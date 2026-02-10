@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-3xl font-bold text-gray-800">Lista de Produtos</h1>

        <div class="flex flex-col md:flex-row items-center gap-4">

            <form action="{{ url('/search') }}" method="GET" class="flex items-center shadow-sm w-full md:w-auto">
                <input type="text"
                       name="produto_search"
                       placeholder="Buscar produto..."
                       value="{{ request('produto_search') }}"
                       class="border border-gray-300 rounded-l px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-700 w-full md:w-64">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-4 py-2 rounded-r transition">
                    🔍
                </button>
            </form>

            @auth
                <div class="flex items-center space-x-3">
                    <form action="/produto/delete-all" method="POST" onsubmit="return confirm('TEM CERTEZA? Isso apagará TODOS os produtos do banco de dados!');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition shadow-md flex items-center gap-2">
                            🗑️ <span class="hidden md:inline">Excluir Tudo</span>
                        </button>
                    </form>

                    <a href="/produto/create" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition shadow-md whitespace-nowrap">
                        + Adicionar
                    </a>
                </div>
            @endauth
        </div>
    </div>

    @if(request('produto_search'))
        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 mb-6 rounded shadow-sm flex justify-between items-center" role="alert">
            <div>
                <p class="font-bold">Filtrando resultados</p>
                <p class="text-sm">Mostrando produtos que contêm: <strong>"{{ request('produto_search') }}"</strong></p>
            </div>

            <a href="{{ url('/') }}" class="text-sm bg-blue-100 hover:bg-blue-200 text-blue-800 font-bold py-2 px-4 rounded transition border border-blue-300">
                ✖ Limpar Filtro
            </a>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden my-6 overflow-x-auto">
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
                <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-150">

                    {{-- ID --}}
                    <td class="py-3 px-6 text-left whitespace-nowrap font-bold">
                        {{ $produto->id }}
                    </td>

                    {{-- Nome e Usuário (Corrigido) --}}
                    <td class="py-3 px-6 text-left">
                        <div class="flex flex-col">
                            <a href="/produto/{{ $produto->id }}" class="font-medium text-blue-600 hover:text-blue-800 hover:underline text-base">
                                {{ $produto->name }}
                            </a>
                            {{-- Aqui inserimos o nome do usuário corretamente --}}
                            <span class="text-xs text-gray-400 mt-1">
                                Cadastrado por: {{ $produto->user->name ?? 'Desconhecido' }}
                            </span>
                        </div>
                    </td>

                    {{-- Descrição --}}
                    <td class="py-3 px-6 text-left">
                        {{ Str::limit($produto->description, 50) }}
                    </td>

                    {{-- Preço --}}
                    <td class="py-3 px-6 text-center font-mono font-bold text-gray-700">
                        R$ {{ number_format($produto->price, 2, ',', '.') }}
                    </td>

                    {{-- Ações --}}
                    @auth
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center space-x-2">
                                <a href="/produto/{{ $produto->id }}/edit" class="transform hover:text-purple-500 hover:scale-110 transition" title="Editar">
                                    ✏️
                                </a>
                                <form action="/produto/{{ $produto->id }}/delete" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este item?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="transform hover:text-red-500 hover:scale-110 transition" title="Excluir">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </td>
                    @endauth
                </tr>
            @empty
                {{-- Estado Vazio --}}
                <tr>
                    <td colspan="5" class="py-8 px-6 text-center text-lg text-gray-500 bg-gray-50">
                        @if(request('produto_search'))
                            <div class="flex flex-col items-center">
                                <span class="text-4xl mb-2">🔍</span>
                                {{-- Corrigido de request('produtos') para request('produto_search') --}}
                                <p>Nenhum produto encontrado para <strong>"{{ request('produto_search') }}"</strong>.</p>
                            </div>
                        @else
                            <div class="flex flex-col items-center">
                                <span class="text-4xl mb-2">📂</span>
                                <p>Nenhum produto cadastrado.</p>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
