<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EnderecoDAO;

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
	
	//Actions Menu
	public function actionsMenu(Request $request){

	 switch($request->input('cbQuery')){
		  		 
		 case "endereco":
		   $this->validatedEnderecoRelatorio($request);
		   if($this->enderecoDAO->getLikeEnderecoAll($request->input('consulta'))->count() > 0 ){
		   return $this->getLikeEnderecoPdf($request->input('consulta'));
		   }else{
		    return view('pdf.endereco.home',['msgError' => "Nenhum endereço encontrado para gerar relatório !"]);
		   }
		 break;
		 
		 case "noFilter":
		  if($this->enderecoDAO->getAllDAO()->count() > 0){
		   return $this->getAllPdf();
		  }else{
		   return view('pdf.endereco.home',['msgError' => "É necessario popular com endereço antes de gerar relatório !"]);
		  }
		 break;		
	   }
	   
	}
		
	//Verify if´s empty
	public function validatedEnderecoRelatorio($dados){
	 $validated = $dados->validate([
	  'consulta'  => 'required',
	 ]);	
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
