<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // Nome da tabela
    protected $table = 'produtos';

    // Campos que não quero que sejam alterados
    protected $guarded = array(
        'id'
    );

    // Campos que eu quero alterar
    protected $fillable = array(
        'nome',
        'descricao',
        'valor',
        'quantidade',
        'tamanho',
        'categoria_id'
    );

    // Não precisa instanciar created_at e updated_at
    public $timestamps = false;

    // Relacionando com Categoria
    public function categoria()
    {
        return $this->belongsTo('estoque\Categoria');
    }

}
