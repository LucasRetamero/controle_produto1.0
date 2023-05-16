<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LocalizacaoDAO extends Model
{
    protected $table = 'localizacao';
    protected $fillable = [
        'empresa_id',
        'localizacao'
    ];
    public $timestamps = false;

    //Add
    public function add($dado)
    {
        return LocalizacaoDAO::create($dado);
    }

    //Update
    public function updateLocalizacao($id, $dado)
    {
        return LocalizacaoDAO::where('id', $id)
            ->update($dado);
    }

    //Delete
    public function deleteLocalizacao($id)
    {
        return LocalizacaoDAO::where('id', $id)
            ->delete();
    }

    //Get all list
    public function getAll($empresa_id)
    {
        return LocalizacaoDAO::where('empresa_id', $empresa_id)
            ->get();
    }

    //Get one of list
    public function getOne($id, $empresa_id)
    {
        return LocalizacaoDAO::where('id', $id)
            ->where('empresa_id', $empresa_id)
            ->get();
    }

    //Get all like name of localizacao
    public function getLikeNameAll($name, $empresa_id)
    {
        return LocalizacaoDAO::where('localizacao', 'like', $name . '%')
            ->where('empresa_id', $empresa_id)
            ->get();
    }
}
