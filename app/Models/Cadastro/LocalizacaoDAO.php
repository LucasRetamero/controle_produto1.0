<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;

class LocalizacaoDAO extends Model
{
    protected $table = 'localizacao';
	protected $fillable = ['localizacao',
                           'id_empresa'];
	public $timestamps = false;

    //Add
    public function add($dado){
        return LocalizacaoDAO::create($dado);
	}

	//Update
    public function updateLocalizacao($id, $dado){
        return LocalizacaoDAO::where('id', $id)
                            ->update($dado);
	}

	//Delete
    public function deleteLocalizacao($id){
        return LocalizacaoDAO::where('id', $id)
                            ->delete();
	}

	//Get all list
	public function getAll(){
        return LocalizacaoDAO::all();
	}

	//Get one of list
	public function getOne($id){
        return LocalizacaoDAO::where('id', $id)
                            ->get();
	}

	//Get all like name of localizacao
	public function getLikeNameAll($name){
        return LocalizacaoDAO::where('localizacao', 'like', $name.'%')
                            ->get();
	}
}
