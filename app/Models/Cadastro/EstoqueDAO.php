<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;

class EstoqueDAO extends Model
{
    protected $table = 'estoque';
	protected $fillable = ['nome_produto',
	                       'lote',
	                       'tipo_endereco',
	                       'area',
	                       'rua',
	                       'predio',
	                       'nivel',
	                       'apto'];
	public $timestamps = false;
	
	//Get all list
	public function getAllDAO(){
	return EstoqueDAO::all();	
	}
	
	//Get all by name
	public function getLikeNameDAO($nome){
	return EstoqueDAO::where('nome_produto', 'like', $nome.'%')
                       ->get();	
	}
}
