<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\User;

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

        auth()->user()->produtos()->create($validated);

        return redirect('/')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::find($id);

        if(!$produto){
            return view('not_exists');
        }

        return view('details', compact('produto'));

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

        if($produto && $produto->user_id == auth()->id()) {
            $produto->name = $request->input('name');
            $produto->description = $request->input('description');
            $produto->price = $request->input('price');
            $produto->save();

            return redirect('/')->with('sucess', "produto editado com sucesso");

        } else {
            return redirect('/')->with('denied', "error");
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);

        if($produto && $produto->user_id === auth()->id()) {
            $produto->delete();
            return redirect('/')->with('produto deletado com sucesso');

        } else {
            return redirect('/')->with('erro ao deletar produto');
        }
    }

    public function destroy_all() {

        $user = Auth::user();

        if(Auth::check()) {
            $user->produtos()->delete();
            return redirect('/')->with("sucess", "Sucesso");

        }

        return redirect('/')->with('denied', "erro");
    }

    public function search(Request $request) {
        $search = $request->input('produto_search');

        $produtos = Produto::where('name', 'like', '%'.$search.'%')->get();

        return view('index', compact('produtos'));
    }

    public function gateway() {

    }
}
