<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreusuarioRequest;
use App\Http\Requests\UpdateusuarioRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreusuarioRequest $request)
    {
        $usuario = Usuario::create($request->all());
        return response()->json([
            'message' => 'Cadastrado com sucesso',
            'data' => $usuario
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return response()->json($usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateusuarioRequest $request, Usuario $usuario)
    {
        // Atualiza o e-mail
        $usuario->email = $request->input('email');

        // Atualiza a senha se fornecida
        if ($request->filled('senha')) {
            $usuario->senha = bcrypt($request->input('senha')); // Certifique-se de hash a senha
        }

        // Salva as alterações no banco de dados
        $usuario->save();

        // Retorna uma resposta JSON com uma mensagem de sucesso e os dados atualizados
        return response()->json([
            'message' => 'Atualizado com sucesso',
            'data' => $usuario
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        // Aqui você pode adicionar lógica para excluir o usuário se necessário
        $usuario->delete();
        return response()->json(['message' => 'Usuário excluído com sucesso'], 200);
    }
}
