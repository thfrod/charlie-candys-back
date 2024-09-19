<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('Imagem', 'Categoria')
            ->join('CATEGORIA', 'PRODUTO.CATEGORIA_ID', '=', 'CATEGORIA.CATEGORIA_ID')
            ->join('PRODUTO_ESTOQUE', 'PRODUTO_ESTOQUE.PRODUTO_ID', '=', 'PRODUTO.PRODUTO_ID')
            ->where('PRODUTO_ESTOQUE.PRODUTO_QTD', '>', 0)
            ->where('CATEGORIA_ATIVO', '=', 1)
            ->where("PRODUTO_ATIVO", '=', 1)
            ->whereColumn('PRODUTO_PRECO', '>', "PRODUTO_DESCONTO")
            ->get();

        return response()->json($produtos);
    }
}
