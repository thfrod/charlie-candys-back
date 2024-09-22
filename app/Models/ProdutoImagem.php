<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoImagem extends Model
{
    use HasFactory;

    protected $table = 'PRODUTO_IMAGEM';
    protected $primaryKey = 'IMAGEM_ID';
    public $timestamps = false;

    protected $fillable = [
        'IMAGEM_ORDEM',
        'PRODUTO_ID',
        'IMAGEM_URL'
    ];


    /**
     * Relacionamento com o produto.
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
