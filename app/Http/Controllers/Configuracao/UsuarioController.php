<?php

namespace App\Http\Controllers\Configuracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracao\UsuarioDAO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{
    private $UsuarioDAO;
	
	public function __construct(UsuarioDAO $usuarioDAO){
	 $this->UsuarioDAO = $usuarioDAO;	 
	}
	//$this->UsuarioDAO->authenticate($request);
	
	//Acessar login page
	public function index(){
	 return view('login.index');	
	}
	
	//Realizar login
	public function authenticate(Request $request){
 	 $credentials = $request->only('email', 'password');
	 
	  if(Auth::attempt($credentials)){
		return redirect()->intended('dashboard');
	  }
		
	}
	
	//Deslogar
	public function deslogar(Request $request){
	Auth::logout();
    return redirect('/login');	
	}
	
	//Add / Edit or remove usuario
	public function addEditRemUsuario(Request $request){
	 $validated = $request->validate([
	  'nome'        => 'required',
	  'sobrenome'   => 'required',
	  'email'       => 'required|max:60',
	  'login'       => 'required',
	  'password'    => 'required',
	  'nivelAcesso' => 'required',
	 ]);
	 
	 if($request->input('btnAction') == 'btnEdit'){
	 
	 $this->UsuarioDAO->editUsuario($request->input('id'), $request->all());
	
	}else if($request->input('btnAction') == 'btnRemove'){
	
	$this->UsuarioDAO->removeUsuario($request->input('id'));
	
	}else{
	
	$this->UsuarioDAO->addUsuario($request->all());	
	
	}
	
    return redirect()->route('dashboard.configuracao.usuarios');
	}
	
	//Lista de usuarios
	public function listaUsuarios(){
	return view('dashboard.configuration.usuario.usuario',['dadosUsuarios' => $this->UsuarioDAO->getAllUsuarios()]);	
	}
	
	//Abrir formulario para editar usuario
	public function editOuRemoverUsuario($id){ 
	return view('dashboard.configuration.usuario.usuarioForm',['dadoUsuario' => $this->UsuarioDAO->getOneUsuario($id)]);
	}
	
	//Realizar Query especifica
	public function searchUsuario(Request $request){
	 switch($request->input('cbQuery')){
		case 'Nome':
        return view('dashboard.configuration.usuario.usuario',['dadosUsuarios' => $this->UsuarioDAO->getNomeUsuario($request->input('textSearch'))]);
        break;	
        
        case 'Sobrenome':
        return view('dashboard.configuration.usuario.usuario',['dadosUsuarios' => $this->UsuarioDAO->getSobreNomeUsuario($request->input('textSearch'))]);
        break;	
         
		case 'Email':
        return view('dashboard.configuration.usuario.usuario',['dadosUsuarios' => $this->UsuarioDAO->getEmailUsuario($request->input('textSearch'))]);
        break;	
        
		case 'Login':
        return view('dashboard.configuration.usuario.usuario',['dadosUsuarios' => $this->UsuarioDAO->getLoginUsuario($request->input('textSearch'))]); 
        break;
        
		case 'Nivel de acesso':
        return view('dashboard.configuration.usuario.usuario',['dadosUsuarios' => $this->UsuarioDAO->getNivelAcessoUsuario($request->input('textSearch'))]); 
        break;		
	 }	
	}
}
