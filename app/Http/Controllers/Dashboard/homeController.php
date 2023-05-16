<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EstoqueDAO;
use App\Models\Cadastro\EnderecoDAO;
use App\Models\Configuracao\EmpresaDAO;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
	private  $enderecoVazio = 0,
	         $enderecoOcupados = 0;

    protected $estoqueDAO, $enderecoDAO, $empresaDAO;

	public function  __construct(EstoqueDAO $estoque_dao, EnderecoDAO $endereco_dao, EmpresaDAO $empresa_dao){
        $this->enderecoDAO  = $endereco_dao;
        $this->estoqueDAO   = $estoque_dao;
        $this->empresaDAO   = $empresa_dao;
	}

    public function index(){
     if(Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id)){
      $this->getEnderecoAndVerify();
      return view('dashboard.index',['allEndereco' => $this->enderecoDAO->getAllDAO(Auth::User()->empresa_id)->count(), 'usedEndereco' => $this->getEnderecoOcupados(), 'emptyEndereco' => $this->getEnderecoVazio(), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
     }

      $this->getEnderecoAndVerify();
      return view('dashboard.index',['allEndereco' => $this->enderecoDAO->getAllDAO(Auth::User()->empresa_id)->count(), 'usedEndereco' => $this->getEnderecoOcupados(), 'emptyEndereco' => $this->getEnderecoVazio() ]);
	}

    public function indexToAdm(Request $request){
        if($request->input('empresa_id') == "000"){
          return redirect()->route('dashboard');
        }
      $this->getEnderecoAndVerifyToAdm($request);
      return view('dashboard.index',['allEndereco' => $this->enderecoDAO->getAllDAO($request->input('empresa_id'))->count(), 'usedEndereco' => $this->getEnderecoOcupados(), 'emptyEndereco' => $this->getEnderecoVazio(), 'dadosEmpresa' => $this->empresaDAO->getAllList(), 'empresaSelected' => $request->empresa_id]);
	}

	//Verify empty/used/Existed Endereçs
	public function getEnderecoAndVerify(){
	 //Verify empty or used
	 foreach($this->enderecoDAO->getAllDAO(Auth::User()->empresa_id) as $item){
		if($this->estoqueDAO->getListEnderecoDAO($item->endereco, Auth::User()->empresa_id)->count() == 0){
          $this->setEnderecoVazio($this->getEnderecoVazio()+1);
        }else{
            $this->setEnderecoOcupados($this->getEnderecoOcupados()+1);
        }
	 }
	}

	public function getEnderecoAndVerifyToAdm($request){
	 //Verify empty or used
     foreach($this->enderecoDAO->getAllDAOToAdm($request->input('empresa_id')) as $item){
        if($this->estoqueDAO->getListEnderecoDAOToAdm($item->endereco, $request->input('empresa_id'))->count() == 0){
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
