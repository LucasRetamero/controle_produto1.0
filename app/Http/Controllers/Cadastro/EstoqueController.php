<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EstoqueDAO; 
use App\Models\Cadastro\SubEspecieDAO;
use App\Models\Cadastro\EnderecoDAO;
use App\Models\Cadastro\ProdutosDAO;

class EstoqueController extends Controller
{
	protected $estoqueDAO,$enderecoDAO, $subEspecieDAO, $produtoDAO;
	
	public function __construct(EstoqueDAO $estoque_dao, SubEspecieDAO $subEspecie_dao, EnderecoDAO $endereco_dao, ProdutosDAO $produtos_dao){
	$this->estoqueDAO = $estoque_dao;	
	$this->enderecoDAO = $endereco_dao;	
	$this->subEspecieDAO = $subEspecie_dao;	
	$this->produtoDAO = $produtos_dao;	
	}
	
	//return list of estoque
    public function index(){
	return view('dashboard.cadastro.estoque.estoque',['dados' => $this->estoqueDAO->getAllDAO()]);	
	}
	
	//Open estoque form
	public function getEstoqueForm(){
	return view('dashboard.cadastro.estoque.estoqueForm',['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(), 'dadosEndereco' => $this->enderecoDAO->getAllDAO()] );	
	}
	
	//Get produt and return to estoque form
	public function getEstoqueFormWithProduct(Request $request){
	  if($this->produtoDAO->getLikeCodigoDAO($request->input('nomeProdutoQuery'))->count() > 0){
		return view('dashboard.cadastro.estoque.estoqueForm',['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(), 'dadosEndereco' => $this->enderecoDAO->getAllDAO(), 'msgSuccess' => "Produto Encontrado !", 'dadosProduto' => $this->produtoDAO->getLikeCodigoDAO($request->input('nomeProdutoQuery')) ] );			
	  }else{
		return view('dashboard.cadastro.estoque.estoqueForm',['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(), 'dadosEndereco' => $this->enderecoDAO->getAllDAO(), 'msgError' => "Nenhum produto encontrado !"] );		 
	  }
	}
	
	//Menu of Actions
	public function actionsList(Request $request){
	  switch($request->input('btnAction')){
		case "btnAdd":
		$this->validatedEstoque($request);
		$this->estoqueDAO->addEstoqueDAO($request->except(['_token', 'btnAction']) );
		return $this->getEstoqueFormWithMsg("Logistica cadastrada com sucesso !");
		break;
		
		case "btnEdit":
        $this->validatedEstoque($request);
		$this->estoqueDAO->updateEstoqueDAO($request->input('id'), $request->except(['_token', 'btnAction']) );
		return $this->getEstoqueFormWithMsg("Logistica editada com sucesso !");
		break;
		
		case "btnRemove":
		$this->validatedEstoque($request);
		$this->estoqueDAO->removeEstoqueDAO($request->input('id'));
		return $this->getEstoqueFormWithMsg("Logistica deletada com sucesso !");
		break;
	
	  }	
	}
	
	//List Actions from table
	public function actionsListeTable($id, $option){
	  switch($option){
		case "edit":
         return view('dashboard.cadastro.estoque.estoqueForm',[ 'dadosLogistico'=>$this->estoqueDAO->getIdEstoqueDAO($id), 'dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(), 'dadosEndereco' => $this->enderecoDAO->getAllDAO() ] );	
        break;
		
		case "remove":
        $this->estoqueDAO->removeEstoqueDAO($id);
		return $this->index();
        break;		
	  }		
	}
	
	//Searching menu
	public function searchingMenu(Request $request){
     switch($request->input('tipoQuery')){
	   case "nome":
	   return view('dashboard.cadastro.estoque.estoque',['dados' => $this->estoqueDAO->getLikeNameDAO($request->input('textoQuery'))]);	
	   break;
	   
	   case "ean":
	   return view('dashboard.cadastro.estoque.estoque',['dados' => $this->estoqueDAO->getLikeEanDAO($request->input('textoQuery'))]);	
	   break;
	   
	   case "lote":
	   return view('dashboard.cadastro.estoque.estoque',['dados' => $this->estoqueDAO->getLikeLoteDAO($request->input('textoQuery'))]);	
	   break;
	   
	   case "endereco":
	   return view('dashboard.cadastro.estoque.estoque',['dados' => $this->estoqueDAO->getLikeEnderecoDAO($request->input('textoQuery'))]);	
	   break;
	   
	   case "tipo_endereco":
	   return view('dashboard.cadastro.estoque.estoque',['dados' => $this->estoqueDAO->getLikeTipoEnderecoDAO($request->input('textoQuery'))]);	
	   break;
	   
	   case "allQuery":
	    return $this->index();
	   break;	 
	 }		
	}
	
	//Validated Estoque
	public function validatedEstoque($dados){
	$validated = $dados->validate([
	  'codigo'         => 'required',
	  'nome_produto'   => 'required',
	  'ean'            => 'required',
	  'fornecedor'     => 'required',
	  'sub_especie'    => 'required',
	  'lote'           => 'required',
	  'endereco'       => 'required',
	  'tipo_endereco'  => 'required',
	 ]);	
	}
	
	//Return estoque form with a message
	public function getEstoqueFormWithMsg($msg){
	return view('dashboard.cadastro.estoque.estoqueForm',['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(), 'dadosEndereco' => $this->enderecoDAO->getAllDAO(), 'msgSuccess' => $msg] );		
	}
	
}
