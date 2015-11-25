<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Nome da tabela
    protected $table = 'categorias';

    // Campos que não quero que sejam alterados
    protected $guarded = array(
        'id'
    );

    // Campos que eu quero alterar
    protected $fillable = array(
        'nome'
    );

    // Não precisa instanciar created_at e updated_at
    public $timestamps = false;

    public function produtos()
    {
        return $this->hasMany('estoque\Categoria');
    }
}
