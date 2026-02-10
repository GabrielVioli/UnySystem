@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10">

        <nav class="text-sm mb-4 text-gray-500">
            <a href="{{ url('/') }}" class="hover:underline hover:text-blue-500">Produtos</a>
            <span class="mx-2">/</span>
            <span class="text-gray-700 font-semibold">{{ $produto->name }}</span>
        </nav>

        <div class="bg-white shadow-xl rounded-lg overflow-hidden border border-gray-100">

            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">Detalhes do Produto</h1>
                <span class="text-xs font-mono text-gray-400">ID: #{{ $produto->id }}</span>
            </div>

            <div class="p-8">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-2">
                    {{ $produto->name }}
                </h2>

                <div class="text-3xl font-bold text-green-600 mb-6">
                    R$ {{ number_format($produto->price, 2, ',', '.') }}
                </div>

                <hr class="border-gray-200 mb-6">

                <div class="mb-6">
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-2">Descrição</h3>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        {{ $produto->description ?: 'Sem descrição disponível para este produto.' }}
                    </p>
                </div>

                <div class="text-xs text-gray-400 mt-8">
                    Cadastrado em: {{ $produto->created_at?->format('d/m/Y H:i') }}
                </div>
            </div>

            @auth
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                    <a href="{{ url('/') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition">
                        Voltar
                    </a>

                    <a href="{{ url('/produto/' . $produto->id . '/edit') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition flex items-center">
                        ✏️ Editar
                    </a>

                    <form action="{{ url('/produto/' . $produto->id . '/delete') }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition flex items-center">
                            🗑️ Excluir
                        </button>
                    </form>
                </div>
            @endauth

            @guest
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end">
                    <a href="{{ url('/') }}" class="text-blue-500 hover:underline font-semibold">Voltar para a lista</a>
                </div>
            @endguest

        </div>
    </div>
@endsection
