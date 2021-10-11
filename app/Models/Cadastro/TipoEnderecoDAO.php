<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;

class TipoEnderecoDAO extends Model
{
    protected $table = "tipo_endereco";
	protected $fillable = ['tipo_endereco'];
	public $timestamps = false;
	
	//Add new date
	public function addDAO($dado){
	return TipoEnderecoDAO::create($dado);	
	}
	
	//Edit date
	public function editDAO($id, $dado){
	return TipoEnderecoDAO::where('id', $id)	
	                ->update($dado);	
	}
	
	//Remove date
	public function removeDAO($id){
	return TipoEnderecoDAO::where('id', $id)	
	                ->delete();	
	}
	
	//Get all list
	public function getAllDAO(){
	return TipoEnderecoDAO::all();	
	}
	
	//Get a by id
	public function getIdDAO($id){
	return TipoEnderecoDAO::where('id', $id)
	                ->get();	
	}
	
	//Get by like name tipo_endereco
	public function getLikeNameDAO($name){
	return TipoEnderecoDAO::where('tipo_endereco', 'like', $name.'%')
	                ->get();	
	}
}
