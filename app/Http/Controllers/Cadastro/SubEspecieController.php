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
		return $this->getSubEspecieFormWithMsg("Sub-Especie cadastrada com sucesso !");
		break;
		
		case "btnEdit":
		$this->subEspecieDAO->updateSub($request->input('id'), $request->except(['_token','btnAction']));
		return $this->getSubEspecieFormWithMsg("Sub-Especie editada com sucesso !");
		break;
		
		case "btnRemove":
		$this->subEspecieDAO->deleteSub($request->input('id'));
		return $this->getSubEspecieFormWithMsg("Sub-Especie deletada com sucesso !");
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
	 case "nameQuery":
	 return view('dashboard.cadastro.subEspecie.subEspecie', ['dadosSubEspecie' => $this->subEspecieDAO->getAllBySubEspecie($request->input('sub_especie'))]);		
	 break;
	 
	 case "allQuery":
	 return view('dashboard.cadastro.subEspecie.subEspecie', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie()]);	
	 break;

	 }
	}
	
	//Return form Sub Especie with message
	public function getSubEspecieFormWithMsg($msg){
	return view('dashboard.cadastro.subEspecie.subEspecieForm', ['msgSuccess' => $msg]);	
	}
	
    
}
