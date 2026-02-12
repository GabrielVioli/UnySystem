@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl overflow-hidden md:max-w-lg border border-gray-100 mt-10">
    <div class="md:flex">
        <div class="w-full p-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-black text-gray-900 tracking-tight">Novo Ativo</h2>
                    <p class="text-xs text-gray-400 uppercase font-bold mt-1">Cadastro de Inventário</p>
                </div>
                <a href="/" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition">Cancelar</a>
            </div>

            <form action="/produto/store" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-5">
                    <label class="block text-gray-500 text-[10px] font-black uppercase tracking-widest mb-2" for="name">
                        Nome do Produto
                    </label>
                    <input class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl shadow-inner focus:ring-2 focus:ring-blue-500 transition-all outline-none text-gray-700 text-sm"
                           id="name" name="name" type="text" placeholder="Ex: iPhone 15 Pro Max" required>
                </div>

                <div class="mb-5">
                    <label class="block text-gray-500 text-[10px] font-black uppercase tracking-widest mb-2" for="description">
                        Descrição Detalhada
                    </label>
                    <textarea class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl shadow-inner focus:ring-2 focus:ring-blue-500 transition-all outline-none text-gray-700 text-sm"
                              id="description" name="description" rows="3" placeholder="Descreva as condições e especificações..."></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div>
                        <label class="block text-gray-500 text-[10px] font-black uppercase tracking-widest mb-2" for="price">
                            Preço de Venda
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm font-bold">R$</span>
                            <input class="w-full pl-10 pr-4 py-3 bg-gray-50 border-none rounded-xl shadow-inner focus:ring-2 focus:ring-blue-500 transition-all outline-none text-gray-700 text-sm font-mono"
                                   id="price" name="price" type="number" step="0.01" placeholder="0,00" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-500 text-[10px] font-black uppercase tracking-widest mb-2" for="image">
                            Capa do Produto
                        </label>
                        <label class="flex flex-col items-center justify-center w-full h-[46px] bg-gray-50 rounded-xl border-2 border-dashed border-gray-200 cursor-pointer hover:bg-gray-100 transition-all">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span class="text-[10px] font-bold text-gray-400 uppercase">Upload</span>
                            </div>
                            <input type="file" name="image" id="image" class="hidden" accept="image/*">
                        </label>
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-xl shadow-lg shadow-blue-200 transition-all transform active:scale-95 uppercase text-xs tracking-widest"
                            type="submit">
                        Publicar no UniSystem
                    </button>
                    <p class="text-[9px] text-gray-400 text-center px-4">
                        Ao publicar, o item ficará visível para todos os usuários da plataforma.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection