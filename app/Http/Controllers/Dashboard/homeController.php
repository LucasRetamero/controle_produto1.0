<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EstoqueDAO;
use App\Models\Cadastro\EnderecoDAO;

class homeController extends Controller
{
	private  $enderecoVazio = 0,
	         $enderecoOcupados = 0;

    protected $estoqueDAO, $enderecoDAO;

	public function  __construct(EstoqueDAO $estoque_dao, EnderecoDAO $endereco_dao){
	$this->enderecoDAO = $endereco_dao;
	$this->estoqueDAO = $estoque_dao;
	}

    public function index(){
	 $this->getEnderecoAndVerify();
	 return view('dashboard.index',['allEndereco' => $this->enderecoDAO->getAllDAO()->count(), 'usedEndereco' => $this->getEnderecoOcupados(), 'emptyEndereco' => $this->getEnderecoVazio() ]);
	}

	//Verify empty/used/Existed Endereçs
	public function getEnderecoAndVerify(){
	 //Verify empty or used
	 foreach($this->enderecoDAO->getAllDAO() as $item){
		if($this->estoqueDAO->getListEnderecoDAO($item->endereco)->count() == 0){
          $this->setEnderecoVazio($this->getEnderecoVazio()+1);
        }else{
            $this->setEnderecoOcupados($this->getEnderecoOcupados()+1);
        }
	 }
	}

	//set
	public function setEnderecoVazio($endereco_vazio){
	$this->enderecoVazio = $endereco_vazio;
	}

	public function setEnderecoOcupados($endereco_ocupados){
	$this->enderecoOcupados = $endereco_ocupados;
	}

	//get
   public function getEnderecoVazio(){
    return $this->enderecoVazio;
   }

   public function getEnderecoOcupados(){
    return $this->enderecoOcupados;
   }

}
