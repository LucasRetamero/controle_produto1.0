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
	 ini_set('max_execution_time', '999'); // 300 = 5 seconds	
	 ini_set("memory_limit", '999M');	
	  
       return \PDF::loadView('pdf.apuracaoOcorrencia.apuracaoOcorrenciaPDF',['dados'      => $this->estoqueDAO->getListCodigoDAO($querys),
	                                                                         'detalhe'    => $observationDetalhe,
														                     'dateDay'    => date('d-m-Y'),
														                     'estoquista' => $estoquista,
														                     'validador'  => $validador])
                    ->download('Fazendo Logistica - Apuracao de ocorrencia.pdf');	 
  
	}

	
	
}
