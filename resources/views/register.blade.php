@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center mt-10">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-green-600 p-4">
            <h2 class="text-xl font-bold text-white text-center">Criar Nova Conta</h2>
        </div>
        
        <form class="p-6" method="POST" action="/register/submit">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nome Completo
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" 
                       id="name" type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    E-mail
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" 
                       id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Senha
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" 
                       id="password" type="password" name="password" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                    Confirmar Senha
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" 
                       id="password_confirmation" type="password" name="password_confirmation" required>
            </div>
            
            <div class="flex items-center justify-between">
                <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full transition duration-300" 
                        type="submit">
                    Registrar-se
                </button>
            </div>

            <div class="mt-4 text-center">
                <a href="/login" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Já tem conta? Faça Login
                </a>
            </div>
        </form>
    </div>
</div>
@endsection