<?php

use App\Http\Controllers\JogosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/usuarios')->group(function (){
    Route::post('/cadastrar', [UsuariosController::class, 'cadastrar']);
    Route::post('/login', [UsuariosController::class, 'login']);
});


Route::prefix('/jogos')->group(function (){
    Route::post('/cadastrar', [JogosController::class, 'cadastrar']);
    Route::get('/listar/{idUsuario}', [JogosController::class, 'listar']);
    Route::put('/editar/{idJogo}', [JogosController::class, 'editar']);
    Route::delete('/excluir/{idJogo}', [JogosController::class, 'excluir']);
});