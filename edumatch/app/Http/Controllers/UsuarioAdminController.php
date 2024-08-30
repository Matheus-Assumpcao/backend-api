<?php

namespace App\Http\Controllers;

use App\Models\usuario_admin;
use App\Http\Requests\Storeusuario_adminRequest;
use App\Http\Requests\Updateusuario_adminRequest;

class UsuarioAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuariosAdmin = usuario_admin::all();
        return response()->json($usuariosAdmin);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeusuario_adminRequest $request)
    {
        \Log::info('Dados recebidos na requisição: ' . json_encode($request->all()));

        $usuarioAdmin = usuario_admin::create($request->all());
        return response()->json([
            'message' => 'Cadastrado com sucesso',
            'data' => $usuarioAdmin
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario_admin = usuario_admin::find($id);
    
        if (!$usuario_admin) {
            return response()->json(['message' => 'Usuário administrador não encontrado'], 404);
        }
    
        return response()->json($usuario_admin);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateusuario_adminRequest $request, usuario_admin $usuario_admin)
    {
        $usuario_admin->email = $request->input('email');

        // Atualiza a senha se fornecida
        if ($request->filled('senha')) {
            $usuario_admin->senha = bcrypt($request->input('senha')); // Certifique-se de hash a senha
        }

        // Salva as alterações no banco de dados
        $usuario_admin->save();
        
        return response()->json([
            'message' => 'Atualizado com sucesso',
            'data' => $usuario_admin
        ], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuario_admin $usuario_admin)
    {
        $usuario_admin->delete();
        return response()->json(['message' => 'Usuário administrador excluído com sucesso'], 200);
    }
    
}
