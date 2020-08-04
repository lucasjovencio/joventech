<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepoimentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->check() && auth()->user()->isSuperAdmin()) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'            => 'required|max:255',
            'imagem_destaque'   => 'required|max:1000',
            'publicado_em'      => ['required','date_format:d/m/Y H:i'],
            'visibilidade'      => 'required|boolean',
            'resumo'            => 'required|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titulo.required'               => 'O autor é obrigatório.',
            'titulo.max'                    => 'O nome do autor excedeu 255 caracteres.',
            'publicado_em.required'         => 'A data de depoimento é obrigatória.',
            'publicado_em.date_format'      => 'Data de depoimento inválida.',
            'visibilidade.required'         => 'A visibilidade é obrigatória.',
            'visibilidade.boolean'          => 'Apenas Publico ou Privado é possível.',
            'categorias.resumo'             => 'O depoimento é obrigatório.',
            'categorias.resumo'             => 'O depoimento excedeu 255 caracteres.',
        ];
    }
}
