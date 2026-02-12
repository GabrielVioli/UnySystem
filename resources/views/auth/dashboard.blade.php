@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-gray-500 text-sm">Visão geral do seu estoque</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-100">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Total de Produtos
                            </dt>
                            <dd>
                                <div class="text-2xl font-bold text-gray-900">
                                    {{ $qntProducts }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-blue-50 px-5 py-3">
                <div class="text-sm">
                    <a href="{{ route('profile') }}" class="font-medium text-blue-700 hover:text-blue-900"> Ver todos </a>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-100">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Valor em Estoque
                            </dt>
                            <dd>
                                <div class="text-2xl font-bold text-gray-900">
                                    R$ {{ number_format($totalSumProducts, 2, ',', '.') }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-green-50 px-5 py-3">
                <div class="text-sm">
                    <span class="text-green-700 font-medium"> Patrimônio acumulado </span>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-100">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Recém Adicionado
                            </dt>
                            <dd>
                                <div class="text-lg font-bold text-gray-900 truncate" title="{{ $lastProduct->name ?? '' }}">
                                    {{ $lastProduct->name ?? 'Nenhum' }}
                                </div>
                                <div class="text-xs text-gray-400">
                                    {{ $lastProduct ? $lastProduct->created_at->diffForHumans() : '-' }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-100">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Primeiro Item
                            </dt>
                            <dd>
                                <div class="text-lg font-bold text-gray-900 truncate" title="{{ $firstProduct->name ?? '' }}">
                                    {{ $firstProduct->name ?? 'Nenhum' }}
                                </div>
                                <div class="text-xs text-gray-400">
                                    ID: #{{ $firstProduct->id ?? '-' }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-8 flex justify-end">
        <a href="{{ route('profile') }}" class="flex items-center gap-2 bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition shadow-md">
            <span>Gerenciar Produtos</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>

</div>

@endsection