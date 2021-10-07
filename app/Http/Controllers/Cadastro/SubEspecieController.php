<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\SubEspecieDAO;

class SubEspecieController extends Controller
{
	 private $subEspecieDAO;
	 
	public function __construct(SubEspecieDAO $subEspecie_dao){
	 $this->subEspecieDAO = $subEspecie_dao;
	}
	
	//Return list of Sub_Escpecie
	public function index(){
	return view('dashboard.cadastro.subEspecie.subEspecie', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie()]);	
	}
	
	//Actions to add\update\remove and cancel
    public function actionsMenu(Request $request){
		switch($request->input('btnAction')){
		case "btnAdd":
		$this->validatedProduct($request);
		$this->subEspecieDAO->addSubEspecie($request->except(['_token', 'btnAction']));
		return redirect()->route('dashboard.cadastro.subEspecie');
		break;
		
		case "btnEdit":
		$this->subEspecieDAO->updateSub($request->input('id'), $request->except(['_token','btnAction']));
		return redirect()->route('dashboard.cadastro.subEspecie');
		break;
		
		case "btnRemove":
		$this->subEspecieDAO->deleteSub($request->input('id'));
		return redirect()->route('dashboard.cadastro.subEspecie');
		break;
		
		case "btnCancel":
		return redirect()->route('dashboard.cadastro.subEspecie');
		break;
		}
	}
	
	//Validated Produto
	public function validatedProduct($dados){
	$validated = $dados->validate([
	  'sub_especie'  => 'required',
	 ]);	
	}
	
	//Open form to edit info
	public function editForm($id){
	return view('dashboard.cadastro.subEspecie.subEspecieForm',['dadosSubEspecie' => $this->subEspecieDAO->getOneSub($id)]);
	}
	
	//Detele by url
	public function getDeleteByUrl($id){
	$this->subEspecieDAO->deleteSub($id);
	return redirect()->route('dashboard.cadastro.subEspecie');		
	}
	
	//Search by sub especie
	public function searchBySubEspecie(Request $request){
	 switch($request->input('btnAction')){	
	 case "SubEspecie":
	 return view('dashboard.cadastro.subEspecie.subEspecie', ['dadosSubEspecie' => $this->subEspecieDAO->getAllBySubEspecie($request->input('sub_especie'))]);		
	 break;
	 
	 case "All":
	 return view('dashboard.cadastro.subEspecie.subEspecie', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie()]);	
	 break;

	 }
	}
	
    
}
