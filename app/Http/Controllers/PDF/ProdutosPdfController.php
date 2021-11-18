<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\ProdutosDAO;
use App\Models\Export\ProdutoExport;
use JasperPHP\JasperPHP;
use App\Http\Controllers\PDF\Produtos\ProdutoJasperController;


class ProdutosPdfController extends Controller
{
	protected $produtosDAO;
	
    public function __construct(ProdutosDAO $produtos_dao){
	$this->produtosDAO   = $produtos_dao;
	}

	//Call home produtos
	public function index(){
	return view('pdf.produtos.home');
	}

	
	public function indexErrorMsg($msg){
	return view('pdf.produtos.home',['msgError' => $msg]);	
	}
		
	//Actions Menu
	public function actionsMenu(Request $request){

	 switch($request->input('cbQuery')){
		  
		 case "nome":
		   
		  $this->validatedProdutoRelatorio($request);
		   if($this->produtosDAO->getLikeNomeDAO($request->input('consulta'))->count() == 0){
			return $this->indexErrorMsg("Nenhum produto encontrado para gerar relatório !"); 
		   }else{
			return $this->callReportXmlOrPdf( $request->input('cbQuery'), $request->input('cbMode'), $request->input('consulta'));
		   }	
 		break;
		 
		 case "codigo":
		  $this->validatedProdutoRelatorio($request);  
		   if($this->produtosDAO->getLikeCodigoDAO($request->input('consulta'))->count() == 0 ){ 
		    return $this->indexErrorMsg("Nenhum produto encontrado para gerar relatório !"); 
		   }else{
		    return $this->callReportXmlOrPdf( $request->input('cbQuery'), $request->input('cbMode'), $request->input('consulta')); 
		    }			

		 break;
		 
		 case "ean":
		   $this->validatedProdutoRelatorio($request);
		   if( $this->produtosDAO->getLikeEanDAO($request->input('consulta'))->count() == 0  ){
		    return $this->indexErrorMsg("Nenhum produto encontrado para gerar relatório !"); 
		   }else{
		    return $this->callReportXmlOrPdf( $request->input('cbQuery'), $request->input('cbMode'), $request->input('consulta')); 
		   }
		 break;
		 
		 case "fornecedor":
    	  $this->validatedProdutoRelatorio($request);
		  if($this->produtosDAO->getLikeFornecedorDAO($request->input('consulta'))->count() == 0 ){
		    return $this->indexErrorMsg("Nenhum produto encontrado para gerar relatório !"); 
	      }else{
		   return $this->callReportXmlOrPdf( $request->input('cbQuery'), $request->input('cbMode'), $request->input('consulta')); 
		  }
		 break;
		 
		 case "subEspecie": 
		  $this->validatedProdutoRelatorio($request);
		   if($this->produtosDAO->getLikeSubEspecieDAO($request->input('consulta'))->count() == 0 ){
		    return $this->indexErrorMsg("Nenhum produto encontrado para gerar relatório !"); 
	       }else{
		    return $this->callReportXmlOrPdf( $request->input('cbQuery'), $request->input('cbMode'), $request->input('consulta')); 
		   }		
		break;
		 
		 case "noFilter":  
     	   if($this->produtosDAO->getAllProdutos()->count() == 0){
		    return $this->indexErrorMsg("Nenhum produto encontrado para gerar relatório !"); 
           }else{
		    return $this->callReportXmlOrPdf( $request->input('cbQuery'), $request->input('cbMode'), $request->input('consulta')); 
		   }
		 break;		
	   }
	   
	}
	
    //Call PDF or XML
	public function callReportXmlOrPdf($options, $extension, $query){
	  if($extension == "excel"){
	   return $this->getExcelReport($options, $query);	  
	  }else{
	   return $this->getPdfReport($options, $query); 
	  }
	}

	//Verify if´s empty
	public function validatedProdutoRelatorio($dados){
	 $validated = $dados->validate([
	  'consulta'  => 'required',
	 ]);	
	}
	
	
	//Excel Report --------
	public function getExcelReport($option,$query){
	$report = new ProdutoExport($option,$query);
	return $report->getReportExcel();	
	}
	
	
	//PDF Report ----------
	public function getPdfReport($option, $query){
	 $report = new ProdutoJasperController($option, $query);
     return $report->generateReport();	
	}
}
