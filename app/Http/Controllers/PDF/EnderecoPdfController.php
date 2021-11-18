<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EnderecoDAO;
use App\Models\Export\EnderecoExport;
use App\Http\Controllers\PDF\Endereco\EnderecoJasperController;



class EnderecoPdfController extends Controller
{
	protected $enderecoDAO;
	
    public function __construct(EnderecoDAO $endereco_dao){
	$this->enderecoDAO = $endereco_dao;
	}
	
	//Get Home endereco
	public function index(){
	return view('pdf.endereco.home');
	}
	
	//Get return with msg
	public function indexWthMsg(){
	return view('pdf.endereco.home',['msgError' => "Nenhum endereço encontrado para gerar relatório !"]);
	}

	//Actions Menu
	public function actionsMenu(Request $request){

	 switch($request->input('cbQuery')){
		  		 
		 case "endereco":
		   $this->validatedEnderecoRelatorio($request);
		   
		   if(!$this->enderecoDAO->getLikeEnderecoAll($request->input('consulta'))->count() == 0 ){
             return $this->getPdfOrExcel($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));   
			}else{
		     return $this->indexWthMsg();	
			}
		 break;
		 
		 case "noFilter":
		  if($this->enderecoDAO->getAllDAO()->count() > 0){
		   return $this->getPdfOrExcel($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));   
		  }else{
            return $this->indexWthMsg();  
		   }
		 break;		
	   }
	   
	}

	
	//Return pdf or excel report
	public function getPdfOrExcel($extension, $option,$query){
	 if($extension == "excel"){
	   return $this->getExcelReport($option, $query);
	 }else{
	   return $this->getPdfReport($option, $query);	        
	 }	
	}
		
	//Verify if´s empty
	public function validatedEnderecoRelatorio($dados){
	 $validated = $dados->validate([
	  'consulta'  => 'required',
	 ]);	
	}
	
	

	//Excel----------------------------------
	public function getExcelReport($option, $query){
	$report = new EnderecoExport($option, $query);
    return $report->getReportExcel(); 	
	}

		
	//PDF----------------------------------
	public function getPdfReport($option, $query){
	$report = new EnderecoJasperController($option, $query);
    return $report->generateReport();	
	}
	
	//Get All Endereco
	public function getAllPdf(){
     return \PDF::loadView('pdf.endereco.enderecoPDF',['dados'  => $this->enderecoDAO->getAllDAO(),
	                                          'quantidadeItens' => $this->enderecoDAO->getAllDAO()->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório de Endereço.pdf');	 
	}
	
	//Get all by endereco 
	public function getLikeEnderecoPdf($consulta){
     return \PDF::loadView('pdf.endereco.enderecoPDF',['dados'  => $this->enderecoDAO->getLikeEnderecoAll($consulta),
	                                          'quantidadeItens' => $this->enderecoDAO->getLikeEnderecoAll($consulta)->count(),
											  'dataAtual'       => date('d-m-Y')])
                  ->download('Relatório de Endereço.pdf');	 
	}
}
