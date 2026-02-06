@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-[70vh]">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-600 p-4">
            <h2 class="text-xl font-bold text-white text-center">Acessar Sistema</h2>
        </div>
        
        <form class="p-6" method="POST" action="/login/submit">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    E-mail
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500" 
                       id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Senha
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500" 
                       id="password" type="password" name="password" required>
            </div>
            
            <div class="flex items-center justify-between">
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full transition duration-300" 
                        type="submit">
                    Entrar
                </button>
            </div>

            <div class="mt-4 text-center">
                <a href="/register" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Não tem conta? Cadastre-se
                </a>
            </div>
        </form>
    </div>
</div>
@endsection