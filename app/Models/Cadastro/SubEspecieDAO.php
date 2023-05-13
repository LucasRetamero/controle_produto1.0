<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SubEspecieDAO extends Model
{
    protected $table = 'sub_especie';
    protected $fillable = [
        'empresa_id',
        'sub_especie'
    ];
    public $timestamps = false;


    public function addSubEspecie($dados)
    {
        return SubEspecieDAO::create($dados);
    }

    //Update a sub especie
    public function updateSub($id, $dados)
    {
        return SubEspecieDAO::where('id', $id)
            ->update($dados);
    }

    //Delete a sub especie
    public function deleteSub($id)
    {
        return SubEspecieDAO::where('id', $id)
            ->delete();
    }

    public function getAllSubEspecie()
    {
        return SubEspecieDAO::where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    //buscar todas sub especie
    public function getAllBySubEspecie($sub_especie)
    {
        return SubEspecieDAO::where('sub_especie', 'like', $sub_especie . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }



    //Get one Sub especie
    public function getOneSub($id)
    {
        return SubEspecieDAO::where('id', $id)
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }
}
