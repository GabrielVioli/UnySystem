<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.create_produto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        Produto::create($validated);

        return redirect('/')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::find($id);
        if(!$produto) {
            return response()->json([
                'message' => 'Produto not found'
                ], 404);
        }
        return response()->json($produto, 200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::find($id);

        if(!$produto) {
            return response()->json([
                'message' => 'Produto not found'
                ], 404);
        }
        return view('auth.edit_produto', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::find($id);

        if($produto) {
            $produto->name = $request->input('name');
            $produto->description = $request->input('description');
            $produto->price = $request->input('price');
            $produto->save();

            return response()->json([
                'message' => 'Produto atualizado com sucesso.',
                'produto' => $produto
            ]);
        } else {
            return response()->json([
                'message' => 'Erro ao atualizar o produto.'
            ], 404);
        }

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);

        if($produto) {
            $produto->delete();
            return redirect('/')->with('produto deletado com sucesso');

        } else {
            return redirect('/')->with('erro ao deletar produto');
        }
    }

    public function destroy_all() {
        Produto::truncate();
        return redirect('/');
    }
}
