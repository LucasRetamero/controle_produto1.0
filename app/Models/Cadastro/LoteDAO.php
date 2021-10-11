<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;

class LoteDAO extends Model
{
    protected $table = "lote";
	protected $fillable = ['lote'];
	public $timestamps = false;
	
	//Add new date
	public function addDAO($dado){
	return LoteDAO::create($dado);	
	}
	
	//Edit date
	public function editDAO($id, $dado){
	return LoteDAO::where('id', $id)	
	                ->update($dado);	
	}
	
	//Remove date
	public function removeDAO($id){
	return LoteDAO::where('id', $id)	
	                ->delete();	
	}
	
	//Get all list
	public function getAllDAO(){
	return LoteDAO::all();	
	}
	
	//Get a by id
	public function getIdDAO($id){
	return LoteDAO::where('id', $id)
	                ->get();	
	}
	
	//Get by like name lote
	public function getLikeNameDAO($name){
	return LoteDAO::where('lote', 'like', $name.'%')
	                ->get();	
	}
}
