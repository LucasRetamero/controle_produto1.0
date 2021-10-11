<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\ProdutosDAO;
use App\Models\Cadastro\LocalizacaoDAO;
use App\Models\Cadastro\SubEspecieDAO;

class ProdutosController extends Controller{

    private $produtosDAO,$localizacaoDAO,$subEspecieDAO;

    public function __construct(ProdutosDAO $produtos_dao, LocalizacaoDAO $localizacao_dao, SubEspecieDAO $subEspecie_dao){
	 $this->produtosDAO = $produtos_dao;
	 $this->localizacaoDAO = $localizacao_dao;
	 $this->subEspecieDAO = $subEspecie_dao;
	}
	
	//Lista de produto
	public function index(){
	 return view('dashboard.cadastro.produto.produto',['dados' => $this->produtosDAO->getAllProdutos()]);
	}
	
	//Formulario de produto
	public function indexFormProduto(){
	 return view('dashboard.cadastro.produto.produtoForm',['dadosLocalizacao' => $this->localizacaoDAO->getAll(),
	                                                       'dadosSubEspecie'  => $this->subEspecieDAO->getAllSubEspecie()]);	
	}
	
	public function editFormProduto($id){
	 return view('dashboard.cadastro.produto.produtoForm',['dadosProduto' => $this->produtosDAO->getAllByIdProduto($id),
	                                                       'dadosLocalizacao' => $this->localizacaoDAO->getAll(),
	                                                       'dadosSubEspecie'  => $this->subEspecieDAO->getAllSubEspecie()]);	
	}
	
	//Validated Produto
	public function validatedProduct($dados){
	$validated = $dados->validate([
	  'ean'         => 'required',
	  'nome'        => 'required',
	 ]);	
	}
	
	//Actions to add\update\remove and cancel
    public function actionsMenu(Request $request){
		switch($request->input('btnAction')){
		case "btnAdd":
		$this->validatedProduct($request);
		$this->produtosDAO->addProduto($request->except(['_token','btnAction']));
		return redirect()->route('dashboard.cadastro.produto');
		break;
		
		case "btnEdit":
		$this->produtosDAO->getUpdate($request->input('id'), $request->except(['_token','btnAction']));
		return redirect()->route('dashboard.cadastro.produto');
		break;
		
		case "btnRemove":
		$this->produtosDAO->getDelete($request->input('id'));
		return redirect()->route('dashboard.cadastro.produto');
		break;
		
		case "btnCancel":
		return redirect()->route('dashboard.cadastro.produto');
		break;
		}
	}
	
	//Searching produto
	public function searchingMenu(Request $request){
	  switch($request->input('btnAction')){
		 case "nameQuery": 
		 return view('dashboard.cadastro.produto.produto',['dados' => $this->produtosDAO->getLikeNameDAO($request->input('name'))]); 
		 break; 
		 
		 case "allQuery": 
		 return $this->index();
		 break; 
	  }
	}
	
	//Remove produto from table
	public function removeProduto($id){
	$this->produtosDAO->getDelete($id);	
	return redirect()->route('dashboard.cadastro.produto'); 	
	}
}
