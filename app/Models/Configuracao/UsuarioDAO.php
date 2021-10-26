<?php

namespace App\Models\Configuracao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsuarioDAO extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['nome', 
	                       'sobrenome', 
						   'email', 
						   'login', 
						   'password'];
	public $timestamps = false;
	
	//Cadastrar novo usuarios
	public function addUsuario($dados){
	return UsuarioDAO::create([
	   'nome'      => $dados['nome'],
	   'sobrenome' => $dados['sobrenome'],
	   'email'     => $dados['email'],
	   'login'     => $dados['login'],
	   'password'  => bcrypt($dados['password']),                     
	]);	
	}
	
	//Editar usuario já existente
	public function editUsuario($id,$dados){
	return UsuarioDAO::where('id', $id)
                      ->update([
			        'nome'      => $dados['nome'],
	                'sobrenome' => $dados['sobrenome'],
	                'email'     => $dados['email'],
	                'login'     => $dados['login'],
	                'password'  => bcrypt($dados['password']),
	                ]);	
	}
	
	//Remove Usuario
	public function removeUsuario($id){
	return UsuarioDAO::where('id', $id)
                       ->delete();	
	}
	
    //Buscar todos os usuarios
	public function getAllUsuarios(){
	return UsuarioDAO::all();	
	}
	
	//Buscar apenas um usuario
	public function getOneUsuario($id){
    return UsuarioDAO::where('id', $id)
                       ->get();	
	}
	
	//Buscar pelo nome
	public function getNomeUsuario($nome){
	return UsuarioDAO::where('nome', 'like', $nome.'%')
					   ->get();
	}
	
	//Buscar pelo sobrenome
	public function getSobreNomeUsuario($sobreNome){
	return UsuarioDAO::where('sobrenome', 'like', $sobreNome.'%')
	                   ->get();	
	}
	
	//Buscar pelo email
	public function getEmailUsuario($email){
	return UsuarioDAO::where('email', 'like', $email.'%')
	                   ->get();	
	}
	
	//Verificar quantidade pelo email
	public function getQtdEmailUsuario($email){
	  return UsuarioDAO::where('email', $email)
	                   ->get()
					   ->count();
    }
		
	//Buscar pelo login
	public function getLoginUsuario($login){
	return UsuarioDAO::where('login', 'like', $login.'%')
	                   ->get();	
	}
	
	//Buscar pelo nivel de acesso
	public function getNivelAcessoUsuario($nivelAcesso){
	return UsuarioDAO::where('nivelAcesso', $nivelAcesso)
	                   ->get();	
	 }	
}
