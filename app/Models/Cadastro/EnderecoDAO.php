<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EnderecoDAO extends Model
{
    protected $table = 'endereco';
	protected $fillable = ['empresa_id',
                           'endereco'];
	public $timestamps = false;

    public function addDAO($dado){
        return EnderecoDAO::create($dado);
	}

    public function editDAO($id, $dado){
        return EnderecoDAO::where('id', $id)
                            ->update($dado);
	}

    public function removeDAO($id){
        return EnderecoDAO::where('id', $id)
                            ->delete();
	}

	public function getAllDAO($empresa_id){
	    return EnderecoDAO::where('empresa_id', $empresa_id)
                            ->orderBy('endereco')
                            ->get();
	}

	public function getAllDAOToAdm($empresa_id){
	    return EnderecoDAO::where('empresa_id', $empresa_id)
                            ->orderBy('endereco')
                            ->get();
	}

	public function getIdDAO($id, $empresa_id){
        return EnderecoDAO::where('id', $id)
                            ->where('empresa_id', $empresa_id)
                            ->get();
	}

	public function getLikeEnderecoAll($name, $empresa_id){
        return EnderecoDAO::where('endereco', 'like', $name.'%')
                            ->where('empresa_id', $empresa_id)
                            ->get();
	}
}
