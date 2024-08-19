<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreusuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:usuarios,email',
            'ra' => 'required|unique:usuarios,ra',
            'user_name' => 'required|unique:usuarios,user_name',
            'senha' => [
                'required',
                'string',
                'min:6',             // Mínimo de 6 caracteres
                'regex:/[a-z]/',      // Pelo menos uma letra minúscula
                'regex:/[A-Z]/',      // Pelo menos uma letra maiúscula
                'regex:/[0-9]/',      // Pelo menos um número
                'regex:/[@$!%*?&#.]/', // Pelo menos um caractere especial
            ],
        ];
    }
}
