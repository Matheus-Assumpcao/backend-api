<?php

namespace App\Http\Controllers;

use App\Models\usuario_super_admin;
use App\Http\Requests\Storeusuario_super_adminRequest;
use App\Http\Requests\Updateusuario_super_adminRequest;

class UsuarioSuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuariosSuperAdmins = usuario_super_admin::all();
        return response()->json($usuariosSuperAdmins);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeusuario_super_adminRequest $request)
    {
        // Remova o dd($request->all())
        $usuarioSuperAdmin = usuario_super_admin::create($request->all());
        return response()->json([
            'message' => 'Cadastrado com sucesso',
            'data' => $usuarioSuperAdmin
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario_super_admin = usuario_super_admin::find($id);
    
        if (!$usuario_super_admin) {
            return response()->json(['message' => 'Usuário super administrador não encontrado'], 404);
        }
    
        return response()->json($usuario_super_admin);
    }      
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateusuario_super_adminRequest $request, usuario_super_admin $usuario_super_admin)
    {
        // Atualiza os atributos do modelo com os dados fornecidos
        $usuario_super_admin->update($request->all());
    
        return response()->json([
            'message' => 'Atualizado com sucesso',
            'data' => $usuario_super_admin
        ], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuario_super_admin $usuario_super_admin)
    {
        $usuario_super_admin->delete();
        return response()->json(['message' => 'Usuário super administrador excluído com sucesso'], 200);
    }
}
