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

    public function getAllProdutos($empresa_id)
    {

        return ProdutosDAO::where('empresa_id', $empresa_id)
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

    public function getByIdDAO($id, $empresa_id)
    {
        return ProdutosDAO::where('id', $id)
            ->where('empresa_id', $empresa_id)
            ->get();
    }

    public function getByNomeDAO($name, $empresa_id)
    {
        return ProdutosDAO::where('nome', 'like', $name . '%')
            ->where('empresa_id', $empresa_id)
            ->get();
    }

    public function getByEanDAO($ean, $empresa_id)
    {
        return ProdutosDAO::where('ean', $ean)
            ->where('empresa_id', $empresa_id)
            ->get();
    }

    public function getByCodigoDAO($codigo, $empresa_id)
    {
        return ProdutosDAO::where('codigo', $codigo)
            ->where('empresa_id', $empresa_id)
            ->get();
    }

    public function getByFornecedorDAO($fornecedor, $empresa_id)
    {
        return ProdutosDAO::where('fornecedor', 'like', $fornecedor . '%')
            ->where('empresa_id', $empresa_id)
            ->get();
    }

    public function getBySubEspecieDAO($sub_especie, $empresa_id)
    {
        return ProdutosDAO::where('sub_especie', 'like', $sub_especie . '%')
            ->where('empresa_id', $empresa_id)
            ->get();
    }

    public function getByReferenciaeDAO($referencia, $empresa_id)
    {
        return ProdutosDAO::where('referencia', 'like', $referencia . '%')
            ->where('empresa_id', $empresa_id)
            ->get();
    }

    public function getByClassicacaoDAO($classificacao, $empresa_id)
    {
        return ProdutosDAO::where('classicacao', 'like', $classificacao . '%')
            ->where('empresa_id', $empresa_id)
            ->get();
    }

    public function getByEticaDAO($etica, $empresa_id)
    {
        return ProdutosDAO::where('etica', 'like', $etica . '%')
            ->where('empresa_id', $empresa_id)
            ->get();
    }
}
