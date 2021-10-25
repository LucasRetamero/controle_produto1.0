<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;

class EnderecoDAO extends Model
{
    protected $table = 'endereco';
	protected $fillable = ['endereco'];
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
	public function getLikeEnderecoAll($name){
	 return EnderecoDAO::where('endereco', 'like', $name.'%')
                           ->get();	 
	}
}
