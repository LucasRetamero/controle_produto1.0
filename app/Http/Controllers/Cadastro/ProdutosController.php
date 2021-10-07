<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\ProdutosDAO;

class ProdutosController extends Controller{

    private $produtosDAO;

    public function __construct(ProdutosDAO $produtos_dao){
	 $this->produtosDAO = $produtos_dao;
	}	
	
	public function index(){
	 return view('dashboard.cadastro.produto.produto',['dados' => $this->produtosDAO->getAllProdutos()]);
	}
	
	public function editFormProduto($id){
	 return view('dashboard.cadastro.produto.produtoForm',['dadosProduto' => $this->produtosDAO->getAllByIdProduto($id)]);	
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
		$this->produtosDAO->addProduto($request->all());
		return redirect()->route('dashboard.cadastro.produto');
		break;
		
		case "btnRefresh":
		return redirect()->route('dashboard.cadastro.produto.productAddForm',['dados' => $request->all()]);
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
	
	//Remove produto from table
	public function removeProduto($id){
	$this->produtosDAO->getDelete($id);	
	return redirect()->route('dashboard.cadastro.produto'); 	
	}
}
