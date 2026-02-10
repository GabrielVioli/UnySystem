<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;

Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post'], '/produto/create', [ProdutoController::class, 'create']);
    Route::post('/produto/store', [ProdutoController::class, 'store']);

    Route::match(['get', 'delete'], '/produto/{id}/delete', [ProdutoController::class, 'destroy']);


    Route::get('/produto/{id}/edit', [ProdutoController::class, 'edit']);
    Route::put('/produto/{id}/update', [ProdutoController::class, 'update']);

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::delete('/produto/delete-all', [ProdutoController::class, 'destroy_all']);
});

Route::get('/register', [UserController::class, 'showRegistrationForm']);
Route::post('/register/submit', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login/submit', [UserController::class, 'login']);

Route::get("/", [ProdutoController::class, 'index']);
Route::get('/produto/{id?}', [ProdutoController::class, 'show']);

Route::get('/search', [ProdutoController::class, 'search']);

