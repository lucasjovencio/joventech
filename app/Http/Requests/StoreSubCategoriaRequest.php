<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategoriaRequest extends FormRequest
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
            'nome'              => 'required|max:255',
            'slug'              => 'required|max:255|regex:/(^([a-z0-9-\-]+)?$)/u|unique:categorias,slug,'.request()->route('sub_categorium')
            'categorias_id'     => 'required|exists:categorias,id'
        ];;
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titulo.required'               => 'O nome é obrigatório.',
            'titulo.max'                    => 'O nome excedeu 255 caracteres.',
            'categorias_id.required'        => 'Categoria é obrigatória.',
            'categorias_id.exists'          => 'Categoria inválida.',
            'slug.required'                 => 'O slug é obrigatório.',
            'slug.unique'                   => 'O slug já está sendo utilizado.',
            'slug.regex'                    => 'O slug não é válido.',
            'slug.max'                      => 'O slug excedeu 255 caracteres.',
        ];
    }
}
