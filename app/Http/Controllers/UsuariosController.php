<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function cadastrar(Request $request): JsonResponse
    {
        try {
            $dados = $request->only('vc_nome', 'vc_email', 'vc_senha');

            if (!$this->validarDados($dados, ['vc_nome', 'vc_email', 'vc_senha'])) {
                return response()->json('Dados inválidos!', 400);
            }

            $usuario = Usuarios::cadastrarUsuario($dados);

            return response()->json($usuario, 200);
        } catch (Exception $e) {
            return response()->json('Falha ao cadastrar usuário!', 500);
        }
    }

    public function login(Request $request): JsonResponse
    {
        try {
            $dados = $request->only('vc_email', 'vc_senha');

            if (!$this->validarDados($dados, ['vc_email', 'vc_senha'])) {
                return response()->json('Dados inválidos!', 400);
            }

            $usuario = Usuarios::validarUsuarioExiste($dados);

            if (!$usuario) {
                return response()->json('Usuário não encontrado!', 404);
            }

            return response()->json([$usuario->sr_id, $usuario->vc_nome], 200);
        } catch (Exception $e) {
            return response()->json('Falha ao realizar login!', 500);
        }
    }

    public function validarDados(array $dados, array $camposObrigatorios): bool
    {
        foreach ($camposObrigatorios as $campo) {
            if (!isset($dados[$campo]) || empty($dados[$campo])) {
                return false;
            }
        }

        return true;
    }
}
