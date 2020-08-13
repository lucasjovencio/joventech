<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerfilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->check() && auth()->user()->id == request()->route('id')) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required|max:255',
            'foto'              => 'required|max:1000',
            'lastname'          => 'required|max:255',
            'email'             => 'required|email|max:255|unique:users,email,'.request()->route('id'),
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
            'name.required'                 => 'O nome é obrigatório.',
            'name.max'                      => 'O nome excedeu 255 caracteres.',
            'foto.required'                 => 'A imagem é obrigatória.',
            'foto.max'                      => 'Imagem inválida.',
            'lastname.required'             => 'O sobrenome é obrigatório.',
            'lastname.max'                  => 'O sobrenome excedeu 255 caracteres.',
            'email.required'                => 'O email é obrigatório.',
            'email.email'                   => 'Email inválido.',
            'email.max'                     => 'O email excedeu 255 caracteres.',
            'email.unique'                  => 'O email e inválido.',
        ];
    }
}
