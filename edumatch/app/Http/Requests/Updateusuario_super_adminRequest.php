<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updateusuario_super_adminRequest extends FormRequest
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
        $usuarioSuperAdminId = $this->route('usuarioSuperAdmin')->id;

        return [
            'nome' => 'sometimes|string|max:100',
            'cnpj' => 'sometimes|string|max:100',
            'email' => 'sometimes|email|unique:usuario_super_admins,email,' . $usuarioSuperAdminId,
            'site' => 'sometimes|string|max:244',
            'localizacao' => 'sometimes|string|max:244',
            'qtd_usuarios' => 'sometimes|integer',
            'qtd_usuarios_admins' => 'sometimes|integer',
            'senha' => [
                'nullable',
                'string',
                'min:6',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&#.]/',
            ],
        ];
    }
}
