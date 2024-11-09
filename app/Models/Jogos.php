<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogos extends Model
{
    use HasFactory;

    protected $table = 'tb_jogos';

    protected $fillable = [
        "vc_nome",
        "fk_usuario",
    ];

    const CREATED_AT = 'ts_criado_em';
    const UPDATED_AT = null;

    public static function cadastrarJogo(array $dados): object
    {
        return self::create($dados);
    }

    public static function listarPorUsuario(int $idUsuario): Collection
    {
        return self::where('fk_usuario', $idUsuario)->get();
    }
}
