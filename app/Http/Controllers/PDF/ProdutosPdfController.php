<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\ProdutosDAO;

class ProdutosPdfController extends Controller
{
	protected $produtosDAO;
	
    public function __construct(ProdutosDAO $produtos_dao){
	$this->produtosDAO = $produtos_dao;
	}
	
	//Call home produtos
	public function index(){
	return view('pdf.produtos.home');
	}
		
	//Actions Menu
	public function actionsMenu(Request $request){

	 switch($request->input('cbQuery')){
		  
		 case "nome":
		   $this->validatedProdutoRelatorio($request);
		   if($this->produtosDAO->getLikeNomeDAO($request->input('consulta'))->count() > 0 ){
		   return $this->getLikeNomePdf($request->input('consulta'));
		   }else{
		    return view('pdf.produtos.home',['msgError' => "Nenhum produto encontrado para gerar relatório !"]);
		   }
		 break;
		 
		 case "codigo":
		   $this->validatedProdutoRelatorio($request);
		   if($this->produtosDAO->getLikeCodigoDAO($request->input('consulta'))->count() > 0 ){
		   return $this->getLikeCodigoPdf($request->input('consulta'));
		   }else{
		    return view('pdf.produtos.home',['msgError' => "Nenhum produto encontrado para gerar relatório !"]);
		   }
		 break;
		 
		 case "ean":
		   $this->validatedProdutoRelatorio($request);
		   if($this->produtosDAO->getLikeEanDAO($request->input('consulta'))->count() > 0 ){
		   return $this->getLikeEanPdf($request->input('consulta'));
		   }else{
		    return view('pdf.produtos.home',['msgError' => "Nenhum produto encontrado para gerar relatório !"]);
		   }
		 break;
		 
		 case "fornecedor":
		   $this->validatedProdutoRelatorio($request);
		   if($this->produtosDAO->getLikeFornecedorDAO($request->input('consulta'))->count() > 0 ){
		   return $this->getLikeFornecedorPdf($request->input('consulta'));
		   }else{
		    return view('pdf.produtos.home',['msgError' => "Nenhum produto encontrado para gerar relatório !"]);
		   }
		 break;
		 
		 case "subEspecie":
		   $this->validatedProdutoRelatorio($request);
		   if($this->produtosDAO->getLikeSubEspecieDAO($request->input('consulta'))->count() > 0 ){
		   return $this->getLikeSubEspeciePdf($request->input('consulta'));
		   }else{
		    return view('pdf.produtos.home',['msgError' => "Nenhum produto encontrado para gerar relatório !"]);
		   }
		 break;
		 
		 case "noFilter":
		  if($this->produtosDAO->getAllProdutos()->count() > 0){
		   return $this->getAllPdf();
		  }else{
		   return view('pdf.produtos.home',['msgError' => "É necessario popular com produtos antes de gerar relatório !"]);
		  }
		 break;		
	   }
	   
	}
	
		
	//Verify if´s empty
	public function validatedProdutoRelatorio($dados){
	 $validated = $dados->validate([
	  'consulta'  => 'required',
	 ]);	
	}
	
	//Get All Produtos
	public function getAllPdf(){
     return \PDF::loadView('pdf.produtos.produtosPDF',['dados'  => $this->produtosDAO->getAllProdutos(),
	                                          'quantidadeItens' => $this->produtosDAO->getAllProdutos()->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório de Produtos.pdf');	 
	}
	
	//Get all by nome Produto
	public function getLikeNomePdf($consulta){
     return \PDF::loadView('pdf.produtos.produtosPDF',['dados'  => $this->produtosDAO->getLikeNomeDAO($consulta),
	                                          'quantidadeItens' => $this->produtosDAO->getLikeNomeDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório de Produtos.pdf');	 
	}
	
	//Get all by fornecedor Produto
	public function getLikeFornecedorPdf($consulta){
     return \PDF::loadView('pdf.produtos.produtosPDF',['dados'  => $this->produtosDAO->getLikeFornecedorDAO($consulta),
	                                          'quantidadeItens' => $this->produtosDAO->getLikeFornecedorDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório de Produtos.pdf');	 
	}
	
	//Get all by sub-especie Produto
	public function getLikeSubEspeciePdf($consulta){
     return \PDF::loadView('pdf.produtos.produtosPDF',['dados'  => $this->produtosDAO->getLikeSubEspecieDAO($consulta),
	                                          'quantidadeItens' => $this->produtosDAO->getLikeSubEspecieDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório de Produtos.pdf');	 
	}
	
	//Get all by codigo Produto
	public function getLikeCodigoPdf($consulta){
     return \PDF::loadView('pdf.produtos.produtosPDF',['dados'  => $this->produtosDAO->getLikeCodigoDAO($consulta),
	                                          'quantidadeItens' => $this->produtosDAO->getLikeCodigoDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório de Produtos.pdf');	 
	}
	
	//Get all by EAN Produto
	public function getLikeEanPdf($consulta){
     return \PDF::loadView('pdf.produtos.produtosPDF',['dados'  => $this->produtosDAO->getLikeEanDAO($consulta),
	                                          'quantidadeItens' => $this->produtosDAO->getLikeEanDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório de Produtos.pdf');	 
	}
}
