<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    use HasFactory;

    protected $table = 'PRODUTO';
    protected $primaryKey = 'PRODUTO_ID';
    public $timestamps = false;

    protected $fillable = [
        'PRODUTO_ID',
        'PRODUTO_DESC',
        'PRODUTO_PRECO',
        'PRODUTO_DESCONTO',
        'PRODUTO_ATIVO',
        'CATEGORIA_ID'
    ];

    /**
     * Relacionamento com a tabela de imagens.
     */

    public function Imagem()
    {
        return $this->hasMany(ProdutoImagem::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }

    public function Categoria()
    {
        return $this->belongsTo(Categoria::class, 'CATEGORIA_ID', 'CATEGORIA_ID');
    }

    // public function PedidosItem()
    // {
    //     return $this->hasMany(Pedido_Item::class, 'PRODUTO_ID', 'PRODUTO_ID');
    // }

    // public function ProdutoEstoque()
    // {
    //     return $this->hasMany(Produto_Estoque::class, 'PRODUTO_ID', 'PRODUTO_ID');
    // }
}
