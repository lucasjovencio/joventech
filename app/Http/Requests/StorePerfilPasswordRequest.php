<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerfilPasswordRequest extends FormRequest
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
            'password'    => 'required|confirmed|max:255,min:6',
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
            'password.required'                 => 'O password é obrigatório.',
            'password.max'                      => 'O password excedeu 255 caracteres.',
            'password.min'                      => 'O password precisa ter pelo menos 6 caracteres.',
            'password.confirmed'                => 'A password não confere.',
        ];
    }
}
