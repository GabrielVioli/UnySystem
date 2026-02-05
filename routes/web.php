<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;

Route::get("/", [UserController::class, 'index']);

Route::match(['get', 'post'], '/produto/create', [ProdutoController::class, 'create']);
Route::post('/produto/store', [ProdutoController::class, 'store']);

Route::get('/produto/{id}', [ProdutoController::class, 'show']);

Route::get('/produto/{id}/edit', [ProdutoController::class, 'edit']);
Route::put('/produto/{id}/update', [ProdutoController::class, 'update']);

Route::match(['get', 'delete'], '/produto/{id}/delete', [ProdutoController::class, 'destroy']);
