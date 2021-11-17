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
	
	//Get List like Nome
	public function getLikeNomeDAO($name){
	return ProdutosDAO::where('nome', 'like', $name.'%')
	                    ->get();
	}
	
	//Get List like EAN
	public function getLikeEanDAO($name){
	return ProdutosDAO::where('ean',$name)
	                    ->get();
	}
	
	//Get List like Codigo
	public function getLikeCodigoDAO($name){
	return ProdutosDAO::where('codigo',$name)
	                    ->get();
						
	}
	
	//Get List like fornecedor
	public function getLikeFornecedorDAO($name){
	return ProdutosDAO::where('fornecedor', 'like', $name.'%')
	                    ->get();
						
	}
	
	//Get List like sub-especie
	public function getLikeSubEspecieDAO($name){
	return ProdutosDAO::where('sub_especie', 'like', $name.'%')
	                    ->get();
    }
	

}