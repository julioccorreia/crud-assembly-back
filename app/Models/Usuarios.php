<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'tb_usuarios';
    protected $fillable = [
        "vc_nome",
        "vc_email",
        "vc_senha"
    ];

    protected $hidden = [
        "vc_senha"
    ];

    const CREATED_AT = 'ts_criado_em';
    const UPDATED_AT = null;

    public static function cadastrarUsuario(array $dados): object
    {
        return self::create($dados);
    }

    public static function validarUsuarioExiste(array $dados): ?object
    {
        return self::where($dados)->first();
    }

    public static function encontrarUsuarioPorEmail(string $email): ?object
    {
        return self::where('vc_email', $email)->first();
    }
}
