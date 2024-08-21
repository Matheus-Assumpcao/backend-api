<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class usuario_admin extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome', 'email', 'cargo', 'permissoes', 'escola', 'id_escola', 'user_name', 'senha'
    ];

    // Mutator para criptografar a senha
    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }
}
