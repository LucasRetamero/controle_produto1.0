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

    public function empresaFormToEditData($id){
      return view('dashboard.configuration.empresa.empresaForm', ['dataEmpresa' => $this->empresaDAO->getBusinessByID($id)]);
    }

	//Validate User
	public function validatedBusiness($dados){
	return  $validated = $dados->validate([
                            'razao_social' => 'required',
                            'fantasia'     => 'required',
                            'cnpj'         => 'required',
                            'email'        => 'required|max:60',
                            'contato'      => 'required',
                        ]);
	}

    public function btnAction(Request $request){
        switch($request->input('btnAction')){
            case "btnAdd":
                $this->validatedBusiness($request);
                $this->addEmpresa($request->all());
                return redirect()->route('dashboard.configuracao.empresa');
            break;
            case "btnEdit":
                $this->validatedBusiness($request);
                $this->updateEmpresa($request->input('id'), $request->all());
                return redirect()->route('dashboard.configuracao.empresa');
            break;
            case "btnRemove":
                $this->removeEmpresa($request->input('id'));
                return redirect()->route('dashboard.configuracao.empresa');
            break;
        }
    }

    public function getBusinessFilter(Request $request){
        switch($request->input('cbQuery')){
            case "razao_social":
                $dados = $this->empresaDAO->getBusinessByRazaoSocial($request->input('textSearch'));
                break;
            case "fantasia":
                $dados = $this->empresaDAO->getBusinessByFantasia($request->input('textSearch'));
                break;
            case "cnpj":
                $dados = $this->empresaDAO->getBusinessByCNPJ($request->input('textSearch'));
                break;
            case "email":
                $dados = $this->empresaDAO->getBusinessByEmail($request->input('textSearch'));
                break;
            case "contato":
                $dados = $this->empresaDAO->getBusinessByContato($request->input('textSearch'));
                break;
        }
        return view('dashboard.configuration.empresa.empresa', ['dados' => $dados]);
    }


    private function addEmpresa($request){
       $this->empresaDAO->addEmpresa($request);
    }

    private function updateEmpresa($id, $request){
       $this->empresaDAO->editEmpresa($id, $request);
    }

    private function removeEmpresa($id){
       $this->empresaDAO->removeEmpresa($id);
    }

}
