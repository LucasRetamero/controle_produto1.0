<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ClassificacaoDAO extends Model
{
    protected $table = 'classificacao';
    protected $fillable = [
        'empresa_id',
        'nome'
    ];
    public $timestamps = false;

    public function addDAO($dado)
    {
        return ClassificacaoDAO::create($dado);
    }

    public function editDAO($id, $dado)
    {
        return ClassificacaoDAO::where('id', $id)
            ->update($dado);
    }

    public function removeDAO($id)
    {
        return ClassificacaoDAO::where('id', $id)
            ->delete();
    }

    public function getAllDAO()
    {
        return ClassificacaoDAO::where('empresa_id', Auth::User()->empresa_id)
            ->orderBy('nome')
            ->get();
    }

    public function getByIdDAO($id)
    {
        return ClassificacaoDAO::where('id', $id)
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getByNameDAO($name)
    {
        return ClassificacaoDAO::where('nome', 'like', $name . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }
}
