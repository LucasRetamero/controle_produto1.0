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
	 return ProdutosDAO::create($dados);
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
	
	//Get List like namespace
	public function getLikeNameDAO($name){
	return ProdutosDAO::where('nome', 'like', $name.'%')
	                    ->get();
	}
}
