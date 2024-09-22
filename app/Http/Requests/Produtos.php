<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:1',
            'disponivel' => 'required|boolean',
            'data_lancamento' => 'required|date',
            'email_contato' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres.',
            
            'descricao.string' => 'A descrição deve ser um texto.',
            'descricao.max' => 'A descrição não pode ter mais que 1000 caracteres.',
            
            'preco.required' => 'O campo preço é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número.',
            'preco.min' => 'O preço deve ser um valor positivo.',
            
            'quantidade.required' => 'A quantidade é obrigatória.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade deve ser no mínimo 1.',
            
            'disponivel.required' => 'O campo disponível é obrigatório.',
            'disponivel.boolean' => 'O campo disponível deve ser verdadeiro ou falso.',
            
            'data_lancamento.required' => 'A data de lançamento é obrigatória.',
            'data_lancamento.date' => 'A data de lançamento deve ser uma data válida.',
            
            'email_contato.required' => 'O campo de email de contato é obrigatório.',
            'email_contato.email' => 'O email de contato deve ser um email válido.',
        ];
    }
}
