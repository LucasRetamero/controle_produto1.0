<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EstoqueDAO;
use App\Models\Cadastro\EnderecoDAO;

class homeController extends Controller
{

	protected $enderecoVazio = 0,	
	          $enderecoOcupados = 0;	

			 
	public function  __construct(EstoqueDAO $estoque_dao, EnderecoDAO $endereco_dao){
	$this->enderecoDAO = $endereco_dao;	 	
	$this->estoqueDAO = $estoque_dao;
	}
	
    public function index(){
	 $this->getEnderecoAndVerify();
	 return view('dashboard.index',['allEndereco' => $this->enderecoDAO->getAllDAO()->count(), 'usedEndereco' => $this->enderecoOcupados, 'emptyEndereco' => $this->enderecoVazio ]);	
	}
	
	//Verify empty/used/Existed Endereçs
	public function getEnderecoAndVerify(){
	 
	 //Verify empty
	 foreach($this->enderecoDAO->getAllDAO() as $item){
		if($this->estoqueDAO->getListEnderecoDAO($item->endereco)->count() == 0)
        $this->enderecoVazio++;			
	 }
	 
	 //Verify used
	 foreach($this->enderecoDAO->getAllDAO() as $item){
		if($this->estoqueDAO->getListEnderecoDAO($item->endereco)->count() > 0) 
	    $this->setEnderecoOcupados($this->getEnderecoOcupados()+1);			
	 }
	
	}
	
	//set
	public function setEnderecoVazio($endereco_vazio){
	$this->enderecoVazio = $endereco_vazio;	
	}
	
	public function setEnderecoOcupados($endereco_ocupados){
	$this->enderecoOcupados = $endereco_ocupados;	
	 if($this->estoqueDAO->getListEnderecoDAO($item->endereco)->count() > 0)
      $this->enderecoOcupados++;			
	 }
	 
	
	//get
   public function getEnderecoVazio(){
    return $this->enderecoVazio; 	   
   } 
   
   public function getEnderecoOcupados(){
    return $this->enderecoOcupados; 	   
   }
    
}
