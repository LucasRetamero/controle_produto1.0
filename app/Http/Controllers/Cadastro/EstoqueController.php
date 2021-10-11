<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EstoqueDAO; 

class EstoqueController extends Controller
{
	protected $estoqueDAO;
	
	public function __construct(EstoqueDAO $estoque_dao){
	$this->estoqueDAO = $estoque_dao;	
	}
	
	//return list of estoque
    public function index(){
	return view('dashboard.cadastro.estoque.estoque',['dados' => $this->estoqueDAO->getAllDAO()]);	
	}
	
	//Searching menu
	public function searchingMenu(Request $request){
     switch($request->input('btnAction')){
	   case "nameQuery":
	   return view('dashboard.cadastro.estoque.estoque',['dados' => $this->estoqueDAO->getLikeNameDAO($request->input('nomeProdutoQuery'))]);	
	   break;
	   
	   case "allQuery":
	    return $this->index();
	   break;	 
	 }		
	}
}
