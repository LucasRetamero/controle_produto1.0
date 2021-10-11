<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\LoteDAO;

class LoteController extends Controller
{
    protected $loteDAO;
	
	public function __construct(LoteDAO $lote_dao){
	$this->loteDAO = $lote_dao;	
	}
	
	//Returning list with all Lote
	public function index(){
	return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO()]);	
	}
	
	//Actions to add/edit or remove 
	public function actionsMenu(Request $request){
     switch($request->input('btnAction')){
		 case "btnAdd":
		 $this->validatedLote($request);
		 $this->loteDAO->addDAO($request->all());
		 break;
		 
		 case "btnEdit":
		 $this->validatedLote($request);
		 $this->loteDAO->editDAO($request->input('id'), $request->except(['_token','btnAction']));
		 break;
		 
		 case "btnRemove":
		 $this->validatedLote($request);
		 $this->loteDAO->removeDAO($request->input('id'));
		 break;
		 
	 }
	 return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO()]);		
	}
	
	//Edit/Remove actions from table
	public function editRemoveLoteTable($id, $option){
	 switch($option){
		 
		case "edit":
        return view('dashboard.cadastro.lote.loteForm', ['dadosLote' => $this->loteDAO->getIdDAO($id)]);	
        break;
		
		case "remove":
        $this->loteDAO->removeDAO($id);
        break;		 
	 }
     return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO()]);		 
	}
	
	
	//Searching menu
	public function searchingAction(Request $request){
	 switch($request->input('btnAction')){
	  case "nameQuery":
      return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getLikeNameDAO($request->input('lote'))]);	
	  break;
	 
	  case "allQuery":
	  return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO()]);	
      break;	 
	 }
	}

	//Validated Lote
	public function validatedLote($dados){
	$validated = $dados->validate([
	  'lote'  => 'required',
	 ]);	
	}
	
	
}
