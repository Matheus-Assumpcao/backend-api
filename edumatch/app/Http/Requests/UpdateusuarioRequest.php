<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateusuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Permite que todos os usuários façam essa atualização ou você pode adicionar lógica específica
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Obtém o ID do usuário a ser atualizado
        $usuarioId = $this->route('usuario')->id;

        return [
            'email' => 'required|email|unique:usuarios,email,' . $usuarioId,
            'senha' => [
                'nullable',
                'string',
                'min:6',             // Mínimo de 6 caracteres
                'regex:/[a-z]/',      // Pelo menos uma letra minúscula
                'regex:/[A-Z]/',      // Pelo menos uma letra maiúscula
                'regex:/[0-9]/',      // Pelo menos um número
                'regex:/[@$!%*?&#.]/', // Pelo menos um caractere especial
            ],
        ];
    }

    /**
     * Customize the error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'O e-mail fornecido já está em uso.',
            'senha.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'senha.regex' => 'A senha deve conter pelo menos uma letra minúscula, uma letra maiúscula, um número e um caractere especial.',
        ];
    }
}
