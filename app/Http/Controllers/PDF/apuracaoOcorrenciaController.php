<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EstoqueDAO;
use App\Http\Controllers\PDF\Apuracao\ApuracaoJasperController;


class apuracaoOcorrenciaController extends Controller
{
	protected $estoqueDAO, $homeControler;
	
    public function __construct(EstoqueDAO $estoque_dao){
	$this->estoqueDAO    = $estoque_dao;
	}
	
	//Get Home apuração de ocorrencia
	public function index(){
	return view('pdf.apuracaoOcorrencia.home');
	}
	
	//Actions Menu
	public function actionsMenu(Request $request){
          $this->validatedConsultaRelatorio($request);
		  
		  if(!$this->estoqueDAO->getListCodigoDAO($request->input('consulta'))->count() == 0){
		    return $this->getPdfReport($request->input('consulta'), 
			                           $request->input('observacao_detalhes'), 
									   $request->input('estoquista'),
									   $request->input('validador'));			   
		    }else{
		     return view('pdf.apuracaoOcorrencia.home',['msgError' => "Nenhum produto encontrado para gerar relatório !"]);
		    }
	}
		
	//Verify if´s empty
	public function validatedConsultaRelatorio($dados){
	 $validated = $dados->validate([
	  'consulta'  => 'required'
	 ]);	
	}
	

	//PDF----------------------------------
    public function getPdfReport($querys, $observationDetalhe, $estoquista, $validador){
	 $report = new ApuracaoJasperController($querys, $observationDetalhe, $estoquista, $validador);
	 return $report->generateReport();
	}
}
