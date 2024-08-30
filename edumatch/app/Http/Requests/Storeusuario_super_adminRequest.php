<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeusuario_super_adminRequest extends FormRequest
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
            'cnpj' => 'required|string|max:100',
            'email' => 'required|email|unique:usuario_super_admins,email',
            'site' => 'required|string|max:244',
            'localizacao' => 'required|string|max:244',
            'qtd_usuarios' => 'required|integer',
            'qtd_usuarios_admins' => 'required|integer',
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
