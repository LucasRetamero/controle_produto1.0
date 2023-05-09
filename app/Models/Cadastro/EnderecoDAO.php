<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;

class EnderecoDAO extends Model
{
    protected $table = 'endereco';
	protected $fillable = ['endereco',
                           'id_empresa'];
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

	public function getAllDAO(){
	    return EnderecoDAO::orderBy('endereco')->get();
	}

	public function getIdDAO($id){
        return EnderecoDAO::where('id', $id)
                            ->get();
	}

	public function getLikeEnderecoAll($name){
        return EnderecoDAO::where('endereco', 'like', $name.'%')
                            ->get();
	}
}
