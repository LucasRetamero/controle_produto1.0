<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EstoqueDAO extends Model
{
    protected $table = 'estoque';
    protected $fillable = [
        'codigo',
        'empresa_id',
        'nome_produto',
        'ean',
        'fornecedor',
        'sub_especie',
        'referencia',
        'classificacao',
        'etica',
        'lote',
        'endereco',
        'tipo_endereco'
    ];
    public $timestamps = false;

    //Add Estoque
    public function addEstoqueDAO($dado)
    {
        return EstoqueDAO::create($dado);
    }

    //Update Estoque
    public function updateEstoqueDAO($id, $dado)
    {
        return EstoqueDAO::where('id', $id)
            ->update($dado);
    }

    //Delete Estoque
    public function removeEstoqueDAO($id)
    {
        return EstoqueDAO::where('id', $id)
            ->delete();
    }

    //Get all list
    public function getAllDAO($empresa_id)
    {
        return EstoqueDAO::where('empresa_id', $empresa_id)
            ->orderBy('endereco')
            ->get();
    }

    //Get one by id
    public function getIdEstoqueDAO($id, $empresa_id)
    {
        return EstoqueDAO::where('id', $id)
            ->where('empresa_id', $empresa_id)
            ->get();
    }

    //Get all by name
    public function getLikeNameDAO($nome, $empresa_id)
    {
        return EstoqueDAO::where('nome_produto', 'like', $nome . '%')
            ->where('empresa_id', $empresa_id)
            ->orderBy('endereco')
            ->get();
    }

    //Get all by codigo
    public function getLikeCodigoDAO($nome, $empresa_id)
    {
        return EstoqueDAO::where('codigo', 'like', $nome . '%')
            ->where('empresa_id', $empresa_id)
            ->orderBy('endereco')
            ->get();
    }

    //Get all by ean
    public function getLikeEanDAO($nome, $empresa_id)
    {
        return EstoqueDAO::where('ean', $nome)
            ->where('empresa_id', $empresa_id)
            ->orderBy('endereco')
            ->get();
    }

    //Get all by lote
    public function getLikeLoteDAO($nome, $empresa_id)
    {
        return EstoqueDAO::where('lote', 'like', $nome . '%')
            ->where('empresa_id', $empresa_id)
            ->orderBy('endereco')
            ->get();
    }

    //Get all by endereço
    public function getLikeEnderecoDAO($nome, $empresa_id)
    {
        return EstoqueDAO::where('endereco', 'like', $nome . '%')
            ->where('empresa_id', $empresa_id)
            ->orderBy('endereco')
            ->get();
    }

    //Get all by fornecedor
    public function getLikeFornecedorDAO($nome, $empresa_id)
    {
        return EstoqueDAO::where('fornecedor', 'like', $nome . '%')
            ->where('empresa_id', $empresa_id)
            ->orderBy('endereco')
            ->get();
    }

    //Get all by sub_especie
    public function getLikeSubEspecieDAO($nome, $empresa_id)
    {
        return EstoqueDAO::where('sub_especie', 'like', $nome . '%')
            ->where('empresa_id', $empresa_id)
            ->orderBy('endereco')
            ->get();
    }

    //Get unique by endereço
    public function getListEnderecoDAO($nome, $empresa_id)
    {
        return EstoqueDAO::where('endereco', $nome)
            ->where('empresa_id', $empresa_id)
            ->orderBy('endereco')
            ->get();
    }

    //Get unique by codigo
    public function getListCodigoDAO($nome, $empresa_id)
    {
        return EstoqueDAO::where('codigo', $nome)
            ->where('empresa_id', $empresa_id)
            ->orderBy('endereco')
            ->get();
    }

    //Get all by Tipo_Endereco
    public function getLikeTipoEnderecoDAO($nome, $empresa_id)
    {
        return EstoqueDAO::where('tipo_endereco', 'like', $nome . '%')
            ->where('empresa_id', $empresa_id)
            ->orderBy('endereco')
            ->get();
    }
}
