<?php

namespace App\Http\Controllers;

use App\Models\Jogos;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JogosController extends Controller
{
    public function cadastrar(Request $request): JsonResponse
    {
        try {
            $dados = $request->only('vc_nome', 'fk_usuario');

            if (!$this->validarDados($dados, ['vc_nome', 'fk_usuario'])) {
                return response()->json('Dados inválidos!', 400);
            }

            $jogo = Jogos::cadastrarJogo($dados);

            return response()->json($jogo, 200);
        } catch (Exception $e) {
            return response()->json('Falha ao cadastrar jogo!', 500);
        }
    }

    public function editar(Request $request, int $idJogo): JsonResponse
    {
        try {
            $dados = $request->only('vc_nome', 'fk_usuario');
            $dados['id'] = $idJogo;

            if (!$this->validarDados($dados, ['id', 'vc_nome', 'fk_usuario'])) {
                return response()->json('Dados inválidos!', 400);
            }

            $jogo = Jogos::find($dados['id']);

            if (!$jogo) {
                return response()->json('Jogo não encontrado!', 404);
            }

            $jogo->update($dados);

            return response()->json($jogo, 200);
        } catch (Exception $e) {
            return response()->json('Falha ao editar jogo!', 500);
        }
    }

    public function excluir(int $idJogo): JsonResponse
    {
        try {
            $dados['id'] = $idJogo;

            if (!$this->validarDados($dados, ['id'])) {
                return response()->json('Dados inválidos!', 400);
            }

            $jogo = Jogos::find($dados['id']);

            if (!$jogo) {
                return response()->json('Jogo não encontrado!', 404);
            }

            $jogo->delete();

            return response()->json($jogo, 200);
        } catch (Exception $e) {
            return response()->json('Falha ao excluir jogo!', 500);
        }
    }

    public function listar(int $idUsuario): JsonResponse
    {
        try {
            $jogos = Jogos::listarPorUsuario($idUsuario);

            return response()->json($jogos, 200);
        } catch (Exception $e) {
            return response()->json('Falha ao listar jogos!', 500);
        }
    }

    public function buscarJogoPorId(int $idJogo): JsonResponse
    {
        try {
            $jogo = Jogos::buscarJogoPorId($idJogo);

            if (!$jogo) {
                return response()->json('Jogo não encontrado!', 404);
            }

            return response()->json($jogo, 200);
        } catch (Exception $e) {
            return response()->json('Falha ao buscar jogo!', 500);
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
