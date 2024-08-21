<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeusuario_adminRequest extends FormRequest
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
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:usuario_admins,email',
            'cargo' => 'required|string|max:100',
            'permissoes' => 'required|string|max:244',
            'escola' => 'required|string|max:244',
            'id_escola' => 'required|integer',
            'user_name' => 'required|string|max:244|unique:usuario_admins,user_name',
            'senha' => [
                'required',
                'string',
                'min:6', // Mínimo de 6 caracteres
                'regex:/[a-z]/', // Pelo menos uma letra minúscula
                'regex:/[A-Z]/', // Pelo menos uma letra maiúscula
                'regex:/[0-9]/', // Pelo menos um número
                'regex:/[@$!%*?&#.]/', // Pelo menos um caractere especial
            ],
        ];
    }
}
