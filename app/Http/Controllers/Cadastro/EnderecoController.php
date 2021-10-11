<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EnderecoDAO;

class EnderecoController extends Controller
{
    protected $enderecoDAO;
	
	public function __construct(EnderecoDAO $endereco_dao){
	$this->enderecoDAO = $endereco_dao;	
	}
	
	//Returning list with all Lote
	public function index(){
	return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getAllDAO()]);	
	}
	
	//Actions to add/edit or remove 
	public function actionsMenu(Request $request){
     switch($request->input('btnAction')){
		 case "btnAdd":
		 $this->validatedLote($request);
		 $this->enderecoDAO->addDAO($request->all());
		 break;
		 
		 case "btnEdit":
		 $this->validatedLote($request);
		 $this->enderecoDAO->editDAO($request->input('id'), $request->except(['_token','btnAction']));
		 break;
		 
		 case "btnRemove":
		 $this->validatedLote($request);
		 $this->enderecoDAO->removeDAO($request->input('id'));
		 break;
		 
	 }
	 return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getAllDAO()]);		
	}
	
	//Edit/Remove actions from table
	public function editRemoveTable($id, $option){
	 switch($option){
		 
		case "edit":
        return view('dashboard.cadastro.endereco.enderecoForm', ['dadosEndereco' => $this->enderecoDAO->getIdDAO($id)]);	
        break;
		
		case "remove":
        $this->enderecoDAO->removeDAO($id);
        break;		 
	 }
     return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getAllDAO()]);		 
	}
	
	
	//Searching menu
	public function searchingAction(Request $request){
	 switch($request->input('btnAction')){
	  case "nameQuery":
	  return $this->searchingOptions($request->input('cbQuery'), $request->input('enderecoQuery'));	
	  break;
	 
	  case "allQuery":
	  return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getAllDAO()]);	
      break;	 
	 }
	}
	
	//Searching Area/Rua/Predio/Nivel/Apto
	public function searchingOptions($option, $name){	
	  switch($option){
		case "area":
		 return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getLikeAreaAll($name)]);	
		break;
		
		case "rua":
		return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getLikeRuaAll($name)]);	
		break;
		
		case "predio":
		return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getLikePredioAll($name)]);	
		break;
		
		case "nivel":
		return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getLikeNivelAll($name)]);	
		break;
		
		case "apto":
		return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getLikeAptoAll($name)]);	
		break; 
	 }	
	}

	//Validated Lote
	public function validatedLote($dados){
	$validated = $dados->validate([
	  'area'  => 'required',
	  'rua'  => 'required',
	  'predio'  => 'required',
	  'nivel'  => 'required',
	  'apto'  => 'required',
	 ]);	
	}
}
