<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublicacaoRequest extends FormRequest
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
            'categorias'        => 'required|array|exists:categorias,id',
            'resumo'            => 'required|max:255',
            'conteudo'          => 'required',
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
            'titulo.required'               => 'O título é obrigatório.',
            'titulo.max'                    => 'O título excedeu 255 caracteres.',
            'imagem_destaque.required'      => 'A imagem é obrigatória.',
            'imagem_destaque.max'           => 'Imagem inválida.',
            'publicado_em.required'         => 'A data de publicação é obrigatória.',
            'publicado_em.date_format'      => 'Data de publicação inválida.',
            'visibilidade.required'         => 'A visibilidade é obrigatória.',
            'visibilidade.boolean'          => 'Apenas Publico ou Privado é possível.',
            'categorias.required'           => 'Pelo menos uma categoria é obrigatória.',
            'categorias.array'              => 'Categoria inválida.',
            'categorias.exists'             => 'Categoria inválida.',
            'categorias.resumo'             => 'O resumo é obrigatório.',
            'categorias.resumo'             => 'O resumo excedeu 255 caracteres.',
            'categorias.conteudo'           => 'O conteudo obrigatório.',
        ];
    }
}