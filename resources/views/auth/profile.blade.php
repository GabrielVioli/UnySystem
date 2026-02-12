@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
    
    @if (session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-md shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white shadow-xl rounded-lg overflow-hidden mb-10"> <div class="h-32 bg-gradient-to-r from-blue-500 to-indigo-600"></div>

        <div class="px-4 py-5 sm:px-6 relative">
            <div class="-mt-16 mb-4">
                <img 
                    class="h-32 w-32 rounded-full border-4 border-white shadow-md object-cover bg-white" 
                    src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=EBF4FF&color=7F9CF5' }}" 
                    alt="Foto de {{ $user->name }}"
                >
            </div>
            
            <div class="sm:flex sm:justify-between sm:items-end">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 truncate">{{ $user->name }}</h1>
                    <div class="text-sm text-gray-500 flex items-center gap-2 mt-1">
                        <span>{{ $user->email }}</span>
                        @if($user->email_verified_at)
                            <span class="text-green-500 bg-green-50 px-2 py-0.5 rounded-full text-xs font-medium border border-green-100 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                Verificado
                            </span>
                        @else
                            <span class="text-yellow-600 bg-yellow-50 px-2 py-0.5 rounded-full text-xs font-medium border border-yellow-100">Pendente</span>
                        @endif
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Editar Perfil
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 hover:bg-gray-50 transition">
                    <dt class="text-sm font-medium text-gray-500">ID do Usuário</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 font-mono">#{{ $user->id }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 hover:bg-gray-50 transition">
                    <dt class="text-sm font-medium text-gray-500">Membro desde</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->created_at->format('d/m/Y') }} 
                        <span class="text-gray-400 text-xs ml-1">({{ $user->created_at->diffForHumans() }})</span>
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 hover:bg-gray-50 transition">
                    <dt class="text-sm font-medium text-gray-500">Última alteração</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->updated_at->diffForHumans() }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mt-12">
        {{-- Cabeçalho da Seção com os Botões Alinhados --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 gap-4">
            <h2 class="text-xl font-bold text-gray-800 border-l-4 border-indigo-500 pl-4">
                Meus Produtos
            </h2>
            
            <div class="flex items-center gap-3">
                {{-- Botão Excluir Tudo --}}
                @if(count($produto) > 0) {{-- Só mostra se tiver produtos --}}
                    <form action="/produto/delete-all" method="POST" onsubmit="return confirm('ATENÇÃO: Isso apagará TODOS os seus produtos permanentemente. Tem certeza?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-3 py-2 border border-red-300 shadow-sm text-sm leading-4 font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
                            <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Excluir Tudo
                        </button>
                    </form>
                @endif

                {{-- Botão Adicionar Novo --}}
                <a href="/produto/create" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Adicionar Novo
                </a>
            </div>
        </div>

        {{-- Grid de Produtos --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @forelse ($produto as $item)
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col justify-between overflow-hidden group">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 group-hover:bg-blue-200 transition">
                                #{{ $item->id ?? '?' }}
                            </span>
                            <span class="text-gray-400 text-xs">
                                {{ $item->created_at ? $item->created_at->format('d/m/Y') : '' }}
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 truncate">
                            {{ $item->name }}
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-2">
                            {{ $item->description ?? 'Sem descrição definida para este item.' }}
                        </p>
                    </div>
                    
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex justify-end gap-3">
                        <a href="/produto/{{ $item->id }}/edit" class="text-indigo-600 hover:text-indigo-900 text-sm font-semibold transition hover:underline">Editar</a>
                        <span class="text-gray-300">|</span>
                        <a href="/produto/{{ $item->id }}/delete" class="text-red-600 hover:text-red-900 text-sm font-semibold transition hover:underline">Excluir</a>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-lg border-2 border-dashed border-gray-300 p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhum produto encontrado</h3>
                    <p class="mt-1 text-sm text-gray-500">Comece criando seu primeiro produto agora.</p>
                </div>
            @endforelse
        </div>
    </div>
    
    <footer class="mt-16 border-t border-gray-200 pt-8 text-center">
        <p class="text-sm text-gray-400">&copy; {{ date('Y') }} Sistema Gabriel. Todos os direitos reservados.</p>
    </footer>

</div>

@endsection