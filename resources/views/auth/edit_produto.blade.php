@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden md:max-w-lg mt-10">
        <div class="md:flex">
            <div class="w-full p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Editar Produto</h2>
                        <p class="text-sm text-gray-500">Editando: {{ $produto->name }}</p>
                    </div>
                    <a href="{{ url('/') }}" class="text-sm text-blue-500 hover:underline">Voltar</a>
                </div>

                <form action="/produto/{{ $produto->id }}/update" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Novo nome
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="name"
                               name="name"
                               type="text"
                               value="{{ old('name', $produto->name) }}"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                            Nova descrição
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                  id="description"
                                  name="description"
                                  rows="3"
                                  required>{{ old('description', $produto->description) }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                            Novo preço (R$)
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="price"
                               name="price"
                               type="number"
                               step="0.01"
                               value="{{ old('price', $produto->price) }}"
                               required>
                    </div>

                    <div class="flex items-center justify-end">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out"
                                type="submit">
                            Atualizar Produto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
