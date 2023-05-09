<?php

namespace App\Models\Configuracao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsuarioDAO extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['empresa_id',
                           'nome',
	                       'sobrenome',
						   'email',
						   'login',
						   'password',
						   'nivel_acesso'];
	public $timestamps = false;


	public function addUsuario($dados){
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

	public function editUsuario($id,$dados){
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


	public function removeUsuario($id){
        return UsuarioDAO::where('id', $id)
                        ->delete();
	}


	public function getAllUsuarios(){
        return UsuarioDAO::all();
	}


	public function getOneUsuario($id){
        return UsuarioDAO::where('id', $id)
                        ->get();
	}

	public function getNomeUsuario($nome){
        return UsuarioDAO::where('nome', 'like', $nome.'%')
                        ->get();
	}


	public function getSobreNomeUsuario($sobreNome){
        return UsuarioDAO::where('sobrenome', 'like', $sobreNome.'%')
                        ->get();
	}


	public function getEmailUsuario($email){
        return UsuarioDAO::where('email', 'like', $email.'%')
                        ->get();
	}


	public function getQtdEmailUsuario($email){
        return UsuarioDAO::where('email', $email)
                        ->get()
                        ->count();
    }


	public function getLoginUsuario($login){
        return UsuarioDAO::where('login', 'like', $login.'%')
                        ->get();
	}


	public function getNivelAcessoUsuario($nivelAcesso){
        return UsuarioDAO::where('nivel_acesso', 'like' ,$nivelAcesso.'%')
                        ->get();
	 }

    public function getUsuarioByIdEmpresa($id_empresa){
        return UsuarioDAO::where('empresa_id', $id_empresa)
                            ->get();
    }
}
