<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;

class EstoqueDAO extends Model
{
    protected $table = 'estoque';
	protected $fillable = ['codigo',
	                       'nome_produto',
	                       'ean',
	                       'fornecedor',
	                       'sub_especie',
	                       'lote',
	                       'endereco',
	                       'tipo_endereco',
                           'id_empresa'];
	public $timestamps = false;

	//Add Estoque
	public function addEstoqueDAO($dado){
        return EstoqueDAO::create($dado);
	}

	//Update Estoque
	public function updateEstoqueDAO($id, $dado){
        return EstoqueDAO::where('id',$id)
                        ->update($dado);
	 }

	//Delete Estoque
	public function removeEstoqueDAO($id){
        return EstoqueDAO::where('id',$id)
                        ->delete();
	}

	//Get all list
	public function getAllDAO(){
        return EstoqueDAO::orderBy('endereco')
                        ->get();
	}

	//Get one by id
	public function getIdEstoqueDAO($id){
        return EstoqueDAO::where('id', $id)
                        ->get();
	}

	//Get all by name
	public function getLikeNameDAO($nome){
        return EstoqueDAO::where('nome_produto', 'like', $nome.'%')
                        ->orderBy('endereco')
                        ->get();
	}

	//Get all by codigo
	public function getLikeCodigoDAO($nome){
        return EstoqueDAO::where('codigo', 'like', $nome.'%')
                        ->orderBy('endereco')
                        ->get();
	}

	//Get all by ean
	public function getLikeEanDAO($nome){
        return EstoqueDAO::where('ean', $nome)
                        ->orderBy('endereco')
                        ->get();
	}

	//Get all by lote
	public function getLikeLoteDAO($nome){
        return EstoqueDAO::where('lote','like', $nome.'%')
                        ->orderBy('endereco')
                        ->get();
	}

	//Get all by endereço
	public function getLikeEnderecoDAO($nome){
        return EstoqueDAO::where('endereco','like', $nome.'%')
                        ->orderBy('endereco')
                        ->get();
	}

	//Get all by fornecedor
	public function getLikeFornecedorDAO($nome){
        return EstoqueDAO::where('fornecedor','like', $nome.'%')
                        ->orderBy('endereco')
                        ->get();
	}

	//Get all by sub_especie
	public function getLikeSubEspecieDAO($nome){
        return EstoqueDAO::where('sub_especie','like', $nome.'%')
                        ->orderBy('endereco')
                        ->get();
	}

	//Get unique by endereço
	public function getListEnderecoDAO($nome){
        return EstoqueDAO::where('endereco', $nome)
                        ->orderBy('endereco')
                        ->get();
	}

	//Get unique by codigo
	public function getListCodigoDAO($nome){
        return EstoqueDAO::where('codigo', $nome)
                        ->orderBy('endereco')
                        ->get();
	}

	//Get all by Tipo_Endereco
	public function getLikeTipoEnderecoDAO($nome){
        return EstoqueDAO::where('tipo_endereco', 'like', $nome.'%')
                        ->orderBy('endereco')
                        ->get();
	}
}
