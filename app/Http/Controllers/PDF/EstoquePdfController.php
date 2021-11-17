<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EstoqueDAO;
use App\Models\Export\InventarioExport;
use App\Http\Controllers\PDF\Inventario\InventarioJasperController;

class EstoquePdfController extends Controller
{ 
    protected $estoqueDAO;
    
	public function __construct(EstoqueDAO $estoque_dao){
	 $this->estoqueDAO = $estoque_dao;	
	}
	//Call home
	public function index(){
	 return view('pdf.estoque.home');	
	}
	
	//Call home with a msg
	public function indexMsg(){
	 return view('pdf.estoque.home',['msgError' => "Nenhum inventário encontrado para gerar relatório !"]); 	
	}
	
	//Actions Menu
	public function actionsMenu(Request $request){

	 switch($request->input('cbQuery')){
		   
		 case "codigo":
		   $this->validatedProdutoRelatorio($request);
		   if(!$this->estoqueDAO->getLikeCodigoDAO($request->input('consulta'))->count() == 0 ){
			return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));	   
		   }else{
		    return $this->indexMsg();
		   }
		 break;

		 case "nomeProduto":
		   $this->validatedProdutoRelatorio($request);
		   if(!$this->estoqueDAO->getLikeNameDAO($request->input('consulta'))->count() == 0 ){   
			return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
		   }else{
	    	return $this->indexMsg();   
		   }
		 break;
		 
		 case "fornecedor":
		   $this->validatedProdutoRelatorio($request);
		   if(!$this->estoqueDAO->getLikeFornecedorDAO($request->input('consulta'))->count() == 0 ){	    
			 return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));		   
		    }else{
	    	 return $this->indexMsg();   
		   }
		 break; 
		 
		 case "ean":
		   $this->validatedProdutoRelatorio($request);
		   if(!$this->estoqueDAO->getLikeEanDAO($request->input('consulta'))->count() == 0 ){
		     return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
  		    }else{
	    	 return $this->indexMsg();   
		   }
		 break;
		 
		 case "subEspecie":
		   $this->validatedProdutoRelatorio($request);
		   if(!$this->estoqueDAO->getLikeSubEspecieDAO($request->input('consulta'))->count() == 0 ){    
			return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));		   
		   }else{
		    return view('pdf.estoque.home',['msgError' => "Nenhum inventário encontrado para gerar relatório !"]);
		   }
		 break;
		 
		 case "lote":
		   $this->validatedProdutoRelatorio($request);
		   if(!$this->estoqueDAO->getLikeLoteDAO($request->input('consulta'))->count() == 0 ){  
			 return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));	   
		    }else{
	    	 return $this->indexMsg();   
		   }
		 break; 
		 
		 case "endereco":
		   $this->validatedProdutoRelatorio($request);
		   if(!$this->estoqueDAO->getLikeEnderecoDAO($request->input('consulta'))->count() == 0 ){
			return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
		   }else{
	    	return $this->indexMsg();   
		   }
		 break;
		 
		 
		 case "tipoEndereco":
		   $this->validatedProdutoRelatorio($request);
		    if(!$this->estoqueDAO->getLikeTipoEnderecoDAO($request->input('consulta'))->count() == 0 ){
			 return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));	   
		    }else{
	    	 return $this->indexMsg();   
		   }
		 break;
		 
		 case "noFilter":
		  if(!$this->estoqueDAO->getAllDAO()->count() == 0){
		    return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
		  }else{
	    	return $this->indexMsg();   
		   }
		 break;		
	   }
	}
	
	public function getPdfOrExcelReport($extension, $option, $query){
	 if($extension == "excel"){
	  return $this->getExcelReport($option, $query);	 
	 }else{
	  return $this->getPdfReport($option, $query);	 
	 }	
	}
	

	//Verify if´s empty
	public function validatedProdutoRelatorio($dados){
	 $validated = $dados->validate([
	  'consulta'  => 'required',
	 ]);	
	}
	
	//Excel----------------------------------
	 
	 public function getExcelReport($option, $query){
	  $report = new InventarioExport($option, $query);
      return $report->getReportExcel();	 
	 }
	 
	
	
	//PDF----------------------------------
	
	public function getPdfReport($option, $query){
	 $report =  new InventarioJasperController($option, $query);
     return $report->generateReport();	
	}
	
	//Get All Produtos
	public function getAllPdf(){
     return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getAllDAO(),
	                                          'quantidadeItens' => $this->estoqueDAO->getAllDAO()->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório da Logistica.pdf');	 
	}
	
	//Get All By Codigo Estoque
	public function getLikeCodigoPdf($consulta){
     return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeCodigoDAO($consulta),
	                                          'quantidadeItens' => $this->estoqueDAO->getLikeCodigoDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório da Logistica.pdf');	 
	}
	
	//Get All By Nome Estoque
	public function getLikeNomeProdutoPdf($consulta){
     return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeNameDAO($consulta),
	                                          'quantidadeItens' => $this->estoqueDAO->getLikeNameDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório da Logistica.pdf');	 
	}
	
	//Get All By Ean Estoque
	public function getLikeEanProdutoPdf($consulta){
     return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeEanDAO($consulta),
	                                          'quantidadeItens' => $this->estoqueDAO->getLikeEanDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório da Logistica.pdf');	 
	}
	
	//Get All By Fornecedor Estoque
	public function getLikeFornecedorPdf($consulta){
     return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeFornecedorDAO($consulta),
	                                          'quantidadeItens' => $this->estoqueDAO->getLikeFornecedorDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório da Logistica.pdf');	 
	}
	
	//Get All By Fornecedor Estoque
	public function getLikeSubEspeciePdf($consulta){
     return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeSubEspecieDAO($consulta),
	                                          'quantidadeItens' => $this->estoqueDAO->getLikeSubEspecieDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório da Logistica.pdf');	 
	}
	
	//Get All By Lote Estoque
	public function getLikeLotePdf($consulta){
     return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeLoteDAO($consulta),
	                                          'quantidadeItens' => $this->estoqueDAO->getLikeLoteDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório da Logistica.pdf');	 
	}
	
	//Get All By Endereco Estoque
	public function getLikeEnderecoPdf($consulta){
     return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeEnderecoDAO($consulta),
	                                          'quantidadeItens' => $this->estoqueDAO->getLikeEnderecoDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório da Logistica.pdf');	 
	}
	
	//Get All By Tipo Endereco Estoque
	public function getLikeTipoEnderecoPdf($consulta){
     return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeTipoEnderecoDAO($consulta),
	                                          'quantidadeItens' => $this->estoqueDAO->getLikeTipoEnderecoDAO($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório da Logistica.pdf');	 
	}
}
