<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutosDAO extends Model
{

    protected $table = 'produtos';
    protected $fillable = [
        'codigo',
        'empresa_id',
        'nome',
        'ean',
        'fornecedor',
        'sub_especie',
        'referencia',
        'classificacao',
        'etica',
    ];
    public $timestamps = false;


    //Add
    public function addDAO($dados)
    {
        return ProdutosDAO::create($dados);
    }

    public function updateDAO($id, $dados)
    {
        return ProdutosDAO::where('id', $id)
            ->update($dados);
    }

    public function removeDAO($id)
    {
        return ProdutosDAO::where('id', $id)
            ->delete();
    }

    public function getAllProdutos()
    {
        return ProdutosDAO::where('empresa_id', Auth::User()->empresa_id)
            ->orderBy('nome')
            ->get();
    }

    public function getLimitProdutosDAO($min, $max)
    {
        //max = 500 by page to return no error
        return ProdutosDAO::offset($min)
            ->limit($max)
            ->get();
    }

    public function getByIdDAO($id)
    {
        return ProdutosDAO::where('id', $id)
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getByNomeDAO($name)
    {
        return ProdutosDAO::where('nome', 'like', $name . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getByEanDAO($name)
    {
        return ProdutosDAO::where('ean', $name)
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getByCodigoDAO($name)
    {
        return ProdutosDAO::where('codigo', $name)
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getByFornecedorDAO($name)
    {
        return ProdutosDAO::where('fornecedor', 'like', $name . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getBySubEspecieDAO($name)
    {
        return ProdutosDAO::where('sub_especie', 'like', $name . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getByReferenciaeDAO($name)
    {
        return ProdutosDAO::where('referencia', 'like', $name . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getByClassicacaoDAO($name)
    {
        return ProdutosDAO::where('classicacao', 'like', $name . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }

    public function getByEticaDAO($name)
    {
        return ProdutosDAO::where('etica', 'like', $name . '%')
            ->where('empresa_id', Auth::User()->empresa_id)
            ->get();
    }
}
