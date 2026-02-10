@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[50vh]">
        <div class="bg-red-50 border-l-4 border-red-500 p-8 rounded shadow-md text-center max-w-lg">
            <div class="text-6xl mb-4">😕</div>

            <h1 class="text-3xl font-bold text-gray-800 mb-2">Ops! Produto não encontrado.</h1>

            <p class="text-gray-600 mb-6 text-lg">
                O produto que você está tentando acessar não existe ou foi removido do sistema.
            </p>

            <a href="{{ url('/') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded transition duration-200 shadow-md">
                🔙 Voltar para a Lista
            </a>
        </div>
    </div>
@endsection
