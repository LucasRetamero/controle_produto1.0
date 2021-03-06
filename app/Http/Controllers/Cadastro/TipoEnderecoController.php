<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\TipoEnderecoDAO;

class TipoEnderecoController extends Controller
{
    protected $tipoEnderecoDAO;
	
	public function __construct(TipoEnderecoDAO $tipoEndereco_dao){
	$this->tipoEnderecoDAO = $tipoEndereco_dao;	
	}
	
	//Returning list with all Lote
	public function index(){
	return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO()]);	
	}
	
	//Actions to add/edit or remove 
	public function actionsMenu(Request $request){
     switch($request->input('btnAction')){
		 case "btnAdd":
		 $this->validatedTipoEndereco($request);
		 $this->tipoEnderecoDAO->addDAO($request->all());
		 break;
		 
		 case "btnEdit":
		 $this->validatedTipoEndereco($request);
		 $this->tipoEnderecoDAO->editDAO($request->input('id'), $request->except(['_token','btnAction']));
		 break;
		 
		 case "btnRemove":
		 $this->validatedTipoEndereco($request);
		 $this->tipoEnderecoDAO->removeDAO($request->input('id'));
		 break;
		 
	 }
	 return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO()]);		
	}
	
	//Edit/Remove actions from table
	public function editRemoveLoteTable($id, $option){
	 switch($option){
		 
		case "edit":
        return view('dashboard.cadastro.tipoEndereco.tipoEnderecoForm', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getIdDAO($id)]);	
        break;
		
		case "remove":
        $this->tipoEnderecoDAO->removeDAO($id);
        break;		 
	 }
     return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO()]);		 
	}
	
	
	//Searching menu
	public function searchingAction(Request $request){
	 switch($request->input('btnAction')){
	  case "nameQuery":
      return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getLikeNameDAO($request->input('tipo_endereco'))]);	
	  break;
	 
	  case "allQuery":
	  return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO()]);	
      break;	 
	 }
	}

	//Validated Lote
	public function validatedTipoEndereco($dados){
	$validated = $dados->validate([
	  'tipo_endereco'  => 'required',
	 ]);	
	}
}
