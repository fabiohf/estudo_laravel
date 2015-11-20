<?php

namespace estoque\Http\Requests;

use estoque\Http\Requests\Request;

class ProdutoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:100',
            'descricao' => 'required|max:255',
            'valor' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O :attribute não pode ser vazio.',
            'numeric' => 'O :attribute deve ser numérico.',
            'min' => 'O :attribute deve ter no minimo :min caracteres.',
            'max' => 'O :attribute deve ter no máximo :max caracteres.'
        ];
    }
}
