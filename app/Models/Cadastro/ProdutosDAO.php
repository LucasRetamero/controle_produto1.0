<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProdutosDAO extends Model {

    protected $table = 'produtos';
	protected $fillable = ['codigo',
	                       'nome',
						   'ean',
						   'fornecedor',
						   'sub_especie',
                           'id_empresa'];
	public $timestamps = false;


	//Add
	public function addProduto($dados){
        return ProdutosDAO::create($dados);
	}

	//Get all list
	public function getAllProdutos(){
        return ProdutosDAO::orderBy('nome')
                            ->get();
	}

	public function getLimitProdutosDAO($min,$max){
	 //max = 500 by page to return no error
        return ProdutosDAO::offset($min)
                            ->limit($max)
                            ->get();

	}

	public function getAllByIdProduto($id){
        return ProdutosDAO::where('id', $id)
                            ->get();
	}

	public function getUpdate($id, $dados){
        return ProdutosDAO::where('id',$id)
                            ->update($dados);
	}

	public function getDelete($id){
        return ProdutosDAO::where('id',$id)
                            ->delete();
	}


	public function getLikeNomeDAO($name){
        return ProdutosDAO::where('nome', 'like', $name.'%')
                            ->get();
	}


	public function getLikeEanDAO($name){
        return ProdutosDAO::where('ean',$name)
                            ->get();
	}


	public function getLikeCodigoDAO($name){
        return ProdutosDAO::where('codigo',$name)
                            ->get();

	}


	public function getLikeFornecedorDAO($name){
        return ProdutosDAO::where('fornecedor', 'like', $name.'%')
                            ->get();

	}


	public function getLikeSubEspecieDAO($name){
        return ProdutosDAO::where('sub_especie', 'like', $name.'%')
                            ->get();
    }


}
