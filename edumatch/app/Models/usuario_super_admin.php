<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class usuario_super_admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'cnpj', 'email', 'site', 'localizacao', 'qtd_usuarios', 'qtd_usuarios_admins', 'senha'
    ];

    protected $primaryKey = 'id'; // Confirme se esta é a chave primária correta

    // Mutator para criptografar a senha
    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }
}


