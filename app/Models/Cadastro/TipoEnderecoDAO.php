<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TipoEnderecoDAO extends Model
{
    protected $table = "tipo_endereco";
    protected $fillable = [
        'empresa_id',
        'tipo_endereco'
    ];
    public $timestamps = false;

    //Add new date
    public function addDAO($dado)
    {
        return TipoEnderecoDAO::create($dado);
    }

    //Edit date
    public function editDAO($id, $dado)
    {
        return TipoEnderecoDAO::where('id', $id)
            ->update($dado);
    }

    //Remove date
    public function removeDAO($id)
    {
        return TipoEnderecoDAO::where('id', $id)
            ->delete();
    }

    //Get all list
    public function getAllDAO($empresa_id)
    {
        return TipoEnderecoDAO::where('empresa_id', $empresa_id)
            ->get();
    }

    //Get a by id
    public function getIdDAO($id, $empresa_id)
    {
        return TipoEnderecoDAO::where('id', $id)
            ->where('empresa_id', $empresa_id)
            ->get();
    }

    //Get by like name tipo_endereco
    public function getLikeNameDAO($name, $empresa_id)
    {
        return TipoEnderecoDAO::where('tipo_endereco', 'like', $name . '%')
            ->where('empresa_id', $empresa_id)
            ->get();
    }
}
