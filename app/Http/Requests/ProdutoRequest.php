<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:500',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:1',
            'disponivel' => 'required|boolean',
            'data_lancamento' => 'required|date',
            'email_contato' => 'required|email|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do produto é obrigatório.',
            'nome.string' => 'O nome deve ser um texto.',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres.',

            'descricao.string' => 'A descrição deve ser um texto.',
            'descricao.max' => 'A descrição não pode ter mais que 500 caracteres.',

            'preco.required' => 'O preço do produto é obrigatório.',
            'preco.numeric' => 'O preço deve ser um valor numérico.',
            'preco.min' => 'O preço não pode ser negativo.',

            'quantidade.required' => 'A quantidade é obrigatória.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade deve ser pelo menos 1.',

            'disponivel.required' => 'O campo disponibilidade é obrigatório.',
            'disponivel.boolean' => 'O campo disponível deve ser verdadeiro ou falso.',

            'data_lancamento.required' => 'A data de lançamento é obrigatória.',
            'data_lancamento.date' => 'A data de lançamento deve ser uma data válida.',

            'email_contato.required' => 'O e-mail de contato é obrigatório.',
            'email_contato.email' => 'O e-mail de contato deve ser um e-mail válido.',
            'email_contato.max' => 'O e-mail de contato não pode ter mais que 255 caracteres.'
        ];
    }
}
