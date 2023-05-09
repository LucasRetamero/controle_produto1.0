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
	 public function  getPdfReport($opton, $query){
	 ini_set('max_execution_time', '999'); // 300 = 5 seconds	
	 ini_set("memory_limit", '999M');

	  switch($opton){
	  
	  case "noFilter":
	   return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getAllDAO()])
				   ->download('Relatório de Inventário.pdf');
      break;
	  
	  case "codigo":
       return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeCodigoDAO($query)])
                  ->download('Relatório de Inventário.pdf');	 
      break;
	  
	  case "nomeProduto":
		 return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeNameDAO($query)])
                  ->download('Relatório de Inventário.pdf');	 
     			
		 break;
		 
      case "fornecedor":
		 return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeFornecedorDAO($query)])
                  ->download('Relatório de Inventário.pdf');
		 break;
		 
	  case "ean":
    	 return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeEanDAO($query)])
                  ->download('Relatório de Inventário.pdf');
		
		 break;
		 
	  case "subEspecie": 
		 return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeSubEspecieDAO($query)])
                  ->download('Relatório de Inventário.pdf');	
		break;
		
		case "lote": 
		 return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeLoteDAO($query)])
                  ->download('Relatório de Inventário.pdf');	
		break;
		
		case "endereco": 
		 return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeEnderecoDAO($query)])
                  ->download('Relatório de Inventário.pdf');	
		break;
		
		case "tipoEndereco": 
		 return \PDF::loadView('pdf.estoque.estoquePDF',['dados'  => $this->estoqueDAO->getLikeTipoEnderecoDAO($query)])
                  ->download('Relatório de Inventário.pdf');	
		break;
		
	  }
	}
}
