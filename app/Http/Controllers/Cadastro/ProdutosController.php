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
	  'codigo'       => 'required',
	  'nome'         => 'required',
	  'fornecedor'   => 'required',
	  'sub_especie'  => 'required',
	 ]);	
	}
	
	//Actions to add\update\remove and cancel
    public function actionsMenu(Request $request){
		switch($request->input('btnAction')){
		case "btnAdd":
		$this->validatedProduct($request);
		$this->produtosDAO->addProduto($request->except(['_token','btnAction']));
		return $this->getProdutoFormReturnMsg("Produto cadastrado com sucesso !");
		break;
		
		case "btnEdit":
		$this->produtosDAO->getUpdate($request->input('id'), $request->except(['_token','btnAction']));
		return $this->getProdutoFormReturnMsg("Produto editado com sucesso !");
		break;
		
		case "btnRemove":
		$this->produtosDAO->getDelete($request->input('id'));
		return $this->getProdutoFormReturnMsg("Produto deletado com sucesso !");
		break;
		
		case "btnCancel":
		return redirect()->route('dashboard.cadastro.produto');
		break;
		}
	}
	
	//Searching produto
	public function searchingMenu(Request $request){
	    switch($request->input('cbQuery')){
		  case "nome": 
		  return view('dashboard.cadastro.produto.produto',['dados' => $this->produtosDAO->getLikeNomeDAO($request->input('textSearch') ) ]); 
		  break;
		  
		  case "codigo": 
		  return view('dashboard.cadastro.produto.produto',['dados' => $this->produtosDAO->getLikeCodigoDAO($request->input('textSearch') ) ]); 
		  break; 
		  
		  case "ean": 
		  return view('dashboard.cadastro.produto.produto',['dados' => $this->produtosDAO->getLikeEanDAO($request->input('textSearch') ) ]); 
		  break; 
		  
		  case "fornecedor": 
		  return view('dashboard.cadastro.produto.produto',['dados' => $this->produtosDAO->getLikeFornecedorDAO($request->input('textSearch') ) ]); 
		  break; 
		  
		  case "subEspecie": 
		  return view('dashboard.cadastro.produto.produto',['dados' => $this->produtosDAO->getLikeSubEspecieDAO($request->input('textSearch') ) ]); 
		  break; 
 
	  }
	}
	
	//Remove produto from table
	public function removeProduto($id){
	$this->produtosDAO->getDelete($id);	
	return redirect()->route('dashboard.cadastro.produto'); 	
	}
	
	//Return produto from with a message
	public function getProdutoFormReturnMsg($msg){
	return view('dashboard.cadastro.produto.produtoForm',['msgSuccess' => $msg, 'dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie()]);
	}
}
