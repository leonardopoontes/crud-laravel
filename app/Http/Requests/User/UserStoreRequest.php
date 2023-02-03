<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'string|required',
            'email' => 'email|required',
            'term' => 'accepted'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'O nome é invalido',
            'required' => 'Esse campo é obrigatório',
            'email' => 'Esse campo deve ser um Email',
            'accepted' => 'Aceite os termos de uso',
        ];
    }
}
