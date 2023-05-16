<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\LoteDAO;
use Illuminate\Support\Facades\Auth;

class LoteController extends Controller
{
    protected $loteDAO;

	public function __construct(LoteDAO $lote_dao){
	$this->loteDAO = $lote_dao;
	}

	//Returning list with all Lote
	public function index(){
	return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO(Auth::User()->empresa_id)]);
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
	 return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO(Auth::User()->empresa_id)]);
	}

	//Edit/Remove actions from table
	public function editRemoveLoteTable($id, $option){
	 switch($option){

		case "edit":
        return view('dashboard.cadastro.lote.loteForm', ['dadosLote' => $this->loteDAO->getIdDAO($id, Auth::User()->empresa_id)]);
        break;

		case "remove":
        $this->loteDAO->removeDAO($id);
        break;
	 }
     return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO(Auth::User()->empresa_id)]);
	}


	//Searching menu
	public function searchingAction(Request $request){
	 switch($request->input('btnAction')){
	  case "nameQuery":
      return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getLikeNameDAO($request->input('lote'), Auth::User()->empresa_id)]);
	  break;

	  case "allQuery":
	  return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO(Auth::User()->empresa_id)]);
      break;
	 }
	}

	//Validated Lote
	public function validatedLote($dados){
	$validated = $dados->validate([
      'empresa_id' => 'required',
	  'lote'  => 'required',
	 ]);
	}


}
