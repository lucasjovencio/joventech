<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
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
        if(config('app.google.recaptcha_secret_key')){
            return [
                'nome'                  => 'required|max:255',
                'email'                 => 'required|email|max:255',
                'assunto'               => 'required|max:255',
                'mensagem'              => 'required|max:5000',
                'g-recaptcha-response'  => 'required|captcha'
            ];
        }
        return [
            'nome'                  => 'required|max:255',
            'email'                 => 'required|email|max:255',
            'assunto'               => 'required|max:255',
            'mensagem'              => 'required|max:5000',
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
            'nome.required'                  => 'O nome é obrigatório.',
            'nome.max'                       => 'O nome excedeu 255 caracteres.',
            'email.required'                 => 'O email é obrigatório.',
            'email.max'                      => 'O email excedeu 255 caracteres.',
            'email.email'                    => 'O email não é váido.',
            'assunto.required'               => 'O assunto é obrigatório.',
            'assunto.max'                    => 'O assunto excedeu 255 caracteres.',
            'mensagem.required'              => 'A mensagem é obrigatória.',
            'mensagem.max'                   => 'A mensagem excedeu 5000 caracteres.',
            'g-recaptcha-response.required'  => 'O recaptcha é obrigatório.',
            'g-recaptcha-response.captcha'   => 'Validação de recaptcha inválido.',
        ];
    }
}
