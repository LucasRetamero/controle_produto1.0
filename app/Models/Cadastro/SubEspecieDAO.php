<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;

class SubEspecieDAO extends Model
{
    protected $table = 'sub_especie';
    protected $fillable = ['sub_especie',
                           'id_empresa'];
	public $timestamps = false;


	public function addSubEspecie($dados){
	  return SubEspecieDAO::create($dados);
	}




	public function getAllSubEspecie(){
        return SubEspecieDAO::all();
	}

	//buscar todas sub especie
	public function getAllBySubEspecie($sub_especie){
        return SubEspecieDAO::where('sub_especie', 'like', $sub_especie.'%')
                                ->get();
	}


	//Update a sub especie
	public function updateSub($id, $dados){
        return SubEspecieDAO::where('id', $id)
                            ->update($dados);
	}

	//Delete a sub especie
	public function deleteSub($id){
        return SubEspecieDAO::where('id', $id)
                            ->delete();
	}

	//Get one Sub especie
	public function getOneSub($id){
        return SubEspecieDAO::where('id', $id)
                            ->get();
	}

}
