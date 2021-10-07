<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProdutosDAO extends Model {
	
    protected $table = 'produtos';
	protected $fillable = ['ean', 
	                       'nome', 
						   'data_fabricacao', 
						   'data_vencimento', 
						   'quant_atual', 
						   'quant_minimo',
						   'localizacao',
						   'sub_especie'];
	public $timestamps = false;
	
	
	//Add
	public function addProduto($dados){
	 return ProdutosDAO::create([ 
	        'ean'             => $dados['ean'], 
	        'nome'            => $dados['nome'], 
			'data_fabricacao' => $dados['data_fabricacao'], 
			'data_vencimento' => $dados['data_vencimento'], 
			'quant_atual'     => $dados['quant_atual'], 
			'quant_minimo'    => $dados['quant_minimo'],
			'localizacao'     => $dados['localizacao'],
			'sub_especie'     => $dados['sub_especie'], 
			]);
	}
	
	//Get all list
	public function getAllProdutos(){
	return ProdutosDAO::all();	
	}
	
	//Get produto by Id
	public function getAllByIdProduto($id){
	return ProdutosDAO::where('id', $id)
	                    ->get();	
	}
	
	//Update Produtos
	public function getUpdate($id, $dados){
	return ProdutosDAO::where('id',$id)
                        ->update($dados);	
	}
	
	//Delete Produtos
	public function getDelete($id){
	return ProdutosDAO::where('id',$id)
                        ->delete();	
	}
}
