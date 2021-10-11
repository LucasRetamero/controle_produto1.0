<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\LocalizacaoDAO;

class LocalizacaoController extends Controller
{
	private $localizacaoDAO;
	
    public function __construct(LocalizacaoDAO $localizacao_dao){
	$this->localizacaoDAO = $localizacao_dao;	
	}
	
	//Return List of localizacao
	public function index(){
	  return view('dashboard.cadastro.localizacao.localizacao', ['dadosLocalizacao' => $this->localizacaoDAO->getAll()]);	
	}
	
	//Return Form with date of localizacao
	public function indexFormToEditRemove($id, $option){
	  switch($option){
		case "edit":
		return view('dashboard.cadastro.localizacao.localizacaoForm', ['dadosLocalizacao' => $this->localizacaoDAO->getOne($id)]);	
        break;
		case "remove":
		$this->localizacaoDAO->deleteLocalizacao($id);
        return view('dashboard.cadastro.localizacao.localizacao', ['dadosLocalizacao' => $this->localizacaoDAO->getAll()]);	
        break;		
	   }
	  }
	
	//Actions Menu
	public function actionsMenu(Request $request){
	  switch($request->input('btnAction')){
		case 'btnAdd':
        $this->validatedLocalizacao($request);
		$this->localizacaoDAO->add($request->except(['_token', 'btnAction']));
        return  view('dashboard.cadastro.localizacao.localizacao', ['dadosLocalizacao' => $this->localizacaoDAO->getAll()]);	
	    break;
		
		case 'btnEdit':
        $this->validatedLocalizacao($request);
		$this->localizacaoDAO->updateLocalizacao($request->input('id'), $request->except(['_token', 'btnAction']));
        return  view('dashboard.cadastro.localizacao.localizacao', ['dadosLocalizacao' => $this->localizacaoDAO->getAll()]);	
        break;
		
		case 'btnRemove':
        $this->localizacaoDAO->deleteLocalizacao($request->input('id'));
        return  view('dashboard.cadastro.localizacao.localizacao', ['dadosLocalizacao' => $this->localizacaoDAO->getAll()]);	
        break;		
	  }	
	}
	
	//Validated
	public function validatedLocalizacao($dados){
	$validated = $dados->validate([
	  'localizacao'  => 'required',
	 ]);	
	}
	
	
	//SearchingMenu
	public function searchingMenu(Request $request){
	 switch($request->input('btnAction')){
	  case 'nameQuery':
      return view('dashboard.cadastro.localizacao.localizacao', ['dadosLocalizacao' => $this->localizacaoDAO->getLikeNameAll($request->input('localizacao'))]);
      break;
      
      case 'allQuery':
      return view('dashboard.cadastro.localizacao.localizacao', ['dadosLocalizacao' => $this->localizacaoDAO->getAll()]);	
	  break;	  
	 }	
	}
}
