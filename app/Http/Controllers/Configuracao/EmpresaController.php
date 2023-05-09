<?php

namespace App\Http\Controllers\Configuracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracao\EmpresaDAO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class EmpresaController extends Controller
{
    private $empresaDAO;

	public function __construct(EmpresaDAO $empresaDAO){
	 $this->empresaDAO = $empresaDAO;
	}

	public function index(){
	  return view('dashboard.configuration.empresa.empresa',['dados' => $this->empresaDAO->getAllList()]);

	}

    public function empresaForm(){
      return view('dashboard.configuration.empresa.empresaForm');
    }

	//Validate User
	public function validatedUser($dados){
	return  $validated = $dados->validate([
	  'nome'        => 'required',
	  'sobrenome'   => 'required',
	  'email'       => 'required|max:60',
	  'login'       => 'required',
	  'password'    => 'required',
	  'nivel_acesso'=> 'required',
	 ]);
	}

}
