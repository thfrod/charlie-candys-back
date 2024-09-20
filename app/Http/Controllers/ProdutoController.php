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
        $produtos = Produto::all();
        // with('Imagem', 'Categoria')
        //     ->join('CATEGORIA', 'PRODUTO.CATEGORIA_ID', '=', 'CATEGORIA.CATEGORIA_ID')
        //     ->join('PRODUTO_ESTOQUE', 'PRODUTO_ESTOQUE.PRODUTO_ID', '=', 'PRODUTO.PRODUTO_ID')
        //     ->where('PRODUTO_ESTOQUE.PRODUTO_QTD', '>', 0)
        //     ->where('CATEGORIA_ATIVO', '=', 1)
        //     ->where("PRODUTO_ATIVO", '=', 1)
        //     ->whereColumn('PRODUTO_PRECO', '>', "PRODUTO_DESCONTO")
        //     ->get();

        $response = JsonResource::make($produtos);

        return $this->response(
            Response::$statusTexts[Response::HTTP_OK],
            Response::HTTP_OK,
            $response
        );
    }
}
