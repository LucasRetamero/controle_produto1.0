<?php

namespace App\Http\Controllers\Configuracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracao\usuarioDAO;
use App\Models\Configuracao\EmpresaDAO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{
    private $usuarioDAO, $empresaDAO;

	public function __construct(usuarioDAO $usuarioDAO, EmpresaDAO $empresaDAO){
	 $this->usuarioDAO  = $usuarioDAO;
     $this->empresaDAO  = $empresaDAO;
	}

	//Acessar login page
	public function index(){
	    return view('login.index');
	}

    public function userForm(){
        return view('dashboard.configuration.usuario.usuarioForm',['dadosEmpresa' => $this->empresaDAO->getAllList()]);
    }

	//Realizar login
	public function authenticate(Request $request){
 	 $credentials = $request->only('email', 'password');

	  if(Auth::attempt($credentials)){
		return redirect()->intended('dashboard');
	  }else{
		return view('login.index',['errorMsg' => 'Erro ao realizar login !']);
	  }

	}

	//Deslogar
	public function deslogar(Request $request){
	Auth::logout();
    return redirect('/login');
	}

	//Validate User
	public function validatedUser($dados){
        return  $validated = $dados->validate([
            'empresa_id'  => 'required|not_in:0',
            'nome'        => 'required',
            'sobrenome'   => 'required',
            'email'       => 'required|max:60',
            'login'       => 'required',
            'password'    => 'required',
            'nivel_acesso'=> 'required',
        ]);
	}

	public function addEditRemUsuario(Request $request){

	  switch($request->input('btnAction')){

	 case "btnAdd":
	  if(!$this->verifyEmailDB($request->input('email'))){
       $this->validatedUser($request);
       if($request->input('empresa_id') == 'adm'){ $request->merge(['empresa_id' => null]); }
	   $this->usuarioDAO->addUsuario($request->all());
	   return redirect()->route('dashboard.configuracao.usuarios');
	  }else{
	   return view('dashboard.configuration.usuario.usuarioForm',['errorMessage' => "Email já existente !"]);
	  }
	 break;

	 case "btnEdit":
	  $this->validatedUser($request);
      if($request->input('empresa_id') == 'adm'){ $request->merge(['empresa_id' => null]); }
	  $this->usuarioDAO->editUsuario($request->input('id'), $request->all());
      return redirect()->route('dashboard.configuracao.usuarios');
	 break;

	 case "btnRemove":
	  $this->usuarioDAO->removeUsuario($request->input('id'));
	  return redirect()->route('dashboard.configuracao.usuarios');
	 break;

	 }

    }

	//Verificar se existe o mesmo
	public function verifyEmailDB($email){
     if($this->usuarioDAO->getQtdEmailUsuario($email) > 0)
	  return true;
     else
	  return false;
	}

	//Lista de usuarios
	public function listaUsuarios(){
	   return view('dashboard.configuration.usuario.usuario',['dadosUsuarios' => $this->usuarioDAO->getAllUsuarios()]);
	}

	//Abrir formulario para editar usuario
	public function editOuRemoverUsuario($id){
        return view('dashboard.configuration.usuario.usuarioForm',['dadoUsuario' => $this->usuarioDAO->getOneUsuario($id),
                                                                   'dadosEmpresa' => $this->empresaDAO->getAllList()]);
	}

	//Realizar Query especifica
	public function searchUsuario(Request $request){
	 switch($request->input('cbQuery')){
		case 'Nome':
        return view('dashboard.configuration.usuario.usuario',['dadosUsuarios' => $this->usuarioDAO->getNomeUsuario($request->input('textSearch'))]);
        break;

        case 'Sobrenome':
        return view('dashboard.configuration.usuario.usuario',['dadosUsuarios' => $this->usuarioDAO->getSobreNomeUsuario($request->input('textSearch'))]);
        break;

		case 'Email':
        return view('dashboard.configuration.usuario.usuario',['dadosUsuarios' => $this->usuarioDAO->getEmailUsuario($request->input('textSearch'))]);
        break;

		case 'Login':
        return view('dashboard.configuration.usuario.usuario',['dadosUsuarios' => $this->usuarioDAO->getLoginUsuario($request->input('textSearch'))]);
        break;

		case 'nivel_acesso':
        return view('dashboard.configuration.usuario.usuario',['dadosUsuarios' => $this->usuarioDAO->getNivelAcessoUsuario($request->input('textSearch'))]);
        break;
	 }
	}
}
