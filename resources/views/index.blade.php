@extends('layouts.app')

@section('content')
<div class="relative overflow-hidden mb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl mb-4">
            O ecossistema de <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Gestão de Ativos</span>
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
            Acompanhe o mercado em tempo real. Visualize valores e gerencie seu inventário com a potência do UniSystem.
        </p>
        
        @guest
            <div class="flex justify-center gap-4">
                <a href="/register" class="px-6 py-3 bg-gray-900 text-white font-bold rounded-xl shadow-xl hover:bg-black transition-all transform hover:-translate-y-1 text-sm">
                    Começar Gratuitamente
                </a>
                <a href="#catalogo" class="px-6 py-3 bg-white text-gray-700 font-bold rounded-xl shadow-md border border-gray-200 hover:bg-gray-50 transition text-sm">
                    Ver Catálogo
                </a>
            </div>
        @endguest
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16 px-4">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden group">
        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Produtos Ativos</p>
        <p class="text-3xl font-black text-gray-900">{{ $produtos->count() }}</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden group">
        <p class="text-xs font-bold text-green-600 uppercase mb-1">Volume de Mercado</p>
        <p class="text-3xl font-black text-gray-900">R$ {{ number_format($produtos->sum('price'), 2, ',', '.') }}</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden group">
        <p class="text-xs font-bold text-purple-600 uppercase mb-1">Ticket Médio</p>
        <p class="text-3xl font-black text-gray-900">R$ {{ number_format($produtos->avg('price'), 2, ',', '.') }}</p>
    </div>
</div>

<div id="catalogo" class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4 px-4">
    <div class="text-left w-full md:w-auto">
        <h2 class="text-2xl font-black text-gray-900 tracking-tight">Catálogo de Itens</h2>
    </div>

    <div class="flex items-center gap-3 w-full md:w-auto">
        <form action="{{ url('/search') }}" method="GET" class="relative flex-1 md:w-80">
            <input type="text" name="produto_search" placeholder="Buscar ativo..." value="{{ request('produto_search') }}" 
                   class="w-full pl-5 pr-10 py-3 bg-gray-50 border-none rounded-xl shadow-inner focus:ring-2 focus:ring-blue-500 transition-all outline-none text-sm text-gray-700">
        </form>
        @auth
            <a href="/produto/create" class="p-3 bg-blue-600 text-white rounded-xl shadow-lg hover:bg-blue-700 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </a>
        @endauth
    </div>
</div>

<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mb-20 px-4">
    @forelse($produtos as $produto)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 group">
            <div class="relative h-28 bg-gray-100 overflow-hidden">
                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                    src="{{ $produto->image ? asset('storage/' . $produto->image) : 'https://ui-avatars.com/api/?name='.urlencode($produto->name).'&background=6366f1&color=fff&size=200' }}" 
                    alt="{{ $produto->name }}">
                <div class="absolute top-2 right-2">
                    <span class="bg-white/90 backdrop-blur-sm px-1.5 py-0.5 rounded-md text-[8px] font-bold uppercase text-gray-600 shadow-sm">
                        #{{ $produto->id }}
                    </span>
                </div>
            </div>
            
            <div class="p-3">
                <div class="mb-2">
                    <h3 class="text-sm font-bold text-gray-900 leading-tight truncate group-hover:text-blue-600 transition">
                        {{ $produto->name }}
                    </h3>
                    <p class="text-[9px] text-gray-400 font-bold uppercase mt-0.5">
                        {{ $produto->user->name ?? 'UniSystem' }}
                    </p>
                </div>
                
                <p class="text-gray-500 text-[10px] leading-tight mb-3 h-6 line-clamp-2">
                    {{ $produto->description ?? 'Sem descrição.' }}
                </p>

                <div class="flex items-center justify-between pt-3 border-t border-gray-50">
                    <span class="text-md font-black text-gray-900 font-mono">
                        R$ {{ number_format($produto->price, 0, ',', '.') }}
                    </span>
                    
                    <div class="flex gap-1">
                        @auth
                            <a href="/produto/{{ $produto->id }}/edit" class="p-1 text-gray-400 hover:text-blue-600 transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                            </a>
                        @endauth
                        <a href="/produto/{{ $produto->id }}" class="p-1 bg-gray-50 text-gray-900 rounded-md hover:bg-gray-900 hover:text-white transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full py-16 text-center">
            <p class="text-gray-400 font-bold italic text-sm">Nenhum item em exposição no momento.</p>
        </div>
    @endforelse
</div>
@endsection