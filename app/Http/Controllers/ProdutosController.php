<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    // função para criação de produto
    public function create()
    {
        return view('produtos.create');
    }
    // função para armazenagem de dados
    public function store(Request $request)
    {
        Produto::create([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'preco' => $request->preco,
            'quantidade'=> $request->quantidade,
        ]);
        return "Produto adicionado com sucesso!.";
    }
    // função de leitura de registro
    public function show($id)
    {
        $produto = Produto::findOrFail($id);

        return view('produtos.show', ['produto' => $produto]);
    }
}
