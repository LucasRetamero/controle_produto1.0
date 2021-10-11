<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;

class EnderecoDAO extends Model
{
    protected $table = 'endereco';
	protected $fillable = ['area',
	                       'rua',
	                       'predio',
	                       'nivel',
	                       'apto'];
	public $timestamps = false;
    
    //Add
    public function addDAO($dado){
	return EnderecoDAO::create($dado);	
	}
	
	//Update
    public function editDAO($id, $dado){
	return EnderecoDAO::where('id', $id)
	                       ->update($dado);	
	}
	
	//Delete
    public function removeDAO($id){
	return EnderecoDAO::where('id', $id)
                           ->delete();	
	}	
	
	//Get all list
	public function getAllDAO(){
	return EnderecoDAO::all();	
	}
	
	//Get one of list
	public function getIdDAO($id){
	return EnderecoDAO::where('id', $id)
	                       ->get();	
	}
	
	//Get all like area of localizacao
	public function getLikeAreaAll($name){
	 return EnderecoDAO::where('area', 'like', $name.'%')
                           ->get();	 
	}
	
	//Get all like rua of localizacao
	public function getLikeRuaAll($name){
	 return EnderecoDAO::where('rua', 'like', $name.'%')
                           ->get();	 
	}
	
	//Get all like predio of localizacao
	public function getLikePredioAll($name){
	 return EnderecoDAO::where('predio', 'like', $name.'%')
                           ->get();	 
	}
	
	//Get all like nivel of localizacao
	public function getLikeNivelAll($name){
	 return EnderecoDAO::where('nivel', 'like', $name.'%')
                           ->get();	 
	}
	
	//Get all like apto of localizacao
	public function getLikeAptoAll($name){
	 return EnderecoDAO::where('apto', 'like', $name.'%')
                           ->get();	 
	}
}
