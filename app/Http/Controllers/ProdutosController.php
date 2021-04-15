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
    // função de edição de produtos
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);

        return view('produtos.edit', ['produto' => $produto]);
    }
    //função para atualizar os dados da tabela
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->update([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
        ]);

        return "Produto Atualizado com Sucesso!.";
    }
    // função para exlusão de dados da tabela.
    public function delete($id)
    {
        $produto = Produto::findOrFail($id);

        return view('produtos.delete', ['produto' => '$produto']);
    }
    // função de confirmação de exclusão
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return "Produto Excluído com Sucesso!.";
    }
}
