<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LoteDAO extends Model
{
    protected $table = "lote";
    protected $fillable = [
        'empresa_id',
        'lote'
    ];
    public $timestamps = false;

    //Add new date
    public function addDAO($dado)
    {
        return LoteDAO::create($dado);
    }

    //Edit date
    public function editDAO($id, $dado)
    {
        return LoteDAO::where('id', $id)
            ->update($dado);
    }

    //Remove date
    public function removeDAO($id)
    {
        return LoteDAO::where('id', $id)
            ->delete();
    }

    //Get all list
    public function getAllDAO()
    {
        return LoteDAO::where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    //Get a by id
    public function getIdDAO($id)
    {
        return LoteDAO::where('id', $id)
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    //Get by like name lote
    public function getLikeNameDAO($name)
    {
        return LoteDAO::where('lote', 'like', $name . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }
}
