<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Produto;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoController extends Controller
{
    use HttpResponses;

    public function index()
    {
        $produtos = Produto::with('Imagem', 'Categoria')
            ->join('CATEGORIA', 'PRODUTO.CATEGORIA_ID', '=', 'CATEGORIA.CATEGORIA_ID')
            ->join('PRODUTO_ESTOQUE', 'PRODUTO_ESTOQUE.PRODUTO_ID', '=', 'PRODUTO.PRODUTO_ID')

            ->get();

        return response()->json($produtos);
    }
}
