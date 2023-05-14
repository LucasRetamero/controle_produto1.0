<?php

namespace App\Models\Configuracao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsuarioDAO extends Model
{
    protected $table = 'usuarios';
    protected $fillable = [
        'empresa_id',
        'nome',
        'sobrenome',
        'email',
        'login',
        'password',
        'nivel_acesso'
    ];
    public $timestamps = false;


    public function addUsuario($dados)
    {
        return UsuarioDAO::create([
            'empresa_id'   => $dados['empresa_id'],
            'nome'         => $dados['nome'],
            'sobrenome'    => $dados['sobrenome'],
            'email'        => $dados['email'],
            'login'        => $dados['login'],
            'password'     => bcrypt($dados['password']),
            'nivel_acesso' => $dados['nivel_acesso'],
        ]);
    }

    public function editUsuario($id, $dados)
    {
        return UsuarioDAO::where('id', $id)
            ->update([
                'empresa_id'   => $dados['empresa_id'],
                'nome'         => $dados['nome'],
                'sobrenome'    => $dados['sobrenome'],
                'email'        => $dados['email'],
                'login'        => $dados['login'],
                'password'     => bcrypt($dados['password']),
                'nivel_acesso' => $dados['nivel_acesso'],
            ]);
    }

    public function removeUsuario($id)
    {
        return UsuarioDAO::where('id', $id)
            ->delete();
    }


    public function getAllUsuarios()
    {
        if (empty(Auth::User()->empresa_id)) {
            return UsuarioDAO::all();
        }
        return UsuarioDAO::where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getOneUsuario($id)
    {
        if (empty(Auth::User()->empresa_id)) {
            return UsuarioDAO::where('id', $id)
                ->get();
        }

        return UsuarioDAO::where('id', $id)
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getNomeUsuario($nome)
    {
        if (empty(Auth::User()->empresa_id)) {
            return UsuarioDAO::where('nome', 'like', $nome . '%')
                ->get();
        }

        return UsuarioDAO::where('nome', 'like', $nome . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getSobreNomeUsuario($sobreNome)
    {
        if (empty(Auth::User()->empresa_id)) {
            return UsuarioDAO::where('sobrenome', 'like', $sobreNome . '%')
                ->get();
        }

        return UsuarioDAO::where('sobrenome', 'like', $sobreNome . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getEmailUsuario($email)
    {
        if (empty(Auth::User()->empresa_id)) {
            return UsuarioDAO::where('email', 'like', $email . '%')
                ->get();
        }

        return UsuarioDAO::where('email', 'like', $email . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getQtdEmailUsuario($email)
    {
        if (empty(Auth::User()->empresa_id)) {
            return UsuarioDAO::where('email', $email)
                ->get()
                ->count();
        }

        return UsuarioDAO::where('email', $email)
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get()
            ->count();
    }

    public function getLoginUsuario($login)
    {
        if (empty(Auth::User()->empresa_id)) {
            return UsuarioDAO::where('login', 'like', $login . '%')
                ->get();
        }

        return UsuarioDAO::where('login', 'like', $login . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getNivelAcessoUsuario($nivelAcesso)
    {
        if (empty(Auth::User()->empresa_id)) {
            return UsuarioDAO::where('nivel_acesso', 'like', $nivelAcesso . '%')
                ->get();
        }

        return UsuarioDAO::where('nivel_acesso', 'like', $nivelAcesso . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }
}
