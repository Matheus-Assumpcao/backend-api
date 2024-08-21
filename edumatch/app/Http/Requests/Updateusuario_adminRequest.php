<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updateusuario_adminRequest extends FormRequest
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
        $usuarioAdminId = $this->route('usuario_admin')->id;

        return [
            'nome' => 'sometimes|string|max:100',
            'email' => 'sometimes|email|unique:usuario_admins,email,' . $usuarioAdminId,
            'cargo' => 'sometimes|string|max:100',
            'permissoes' => 'sometimes|string|max:244',
            'escola' => 'sometimes|string|max:244',
            'id_escola' => 'sometimes|integer',
            'user_name' => 'sometimes|string|max:244|unique:usuario_admins,user_name,' . $usuarioAdminId,
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
