<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EstoqueDAO;
use App\Models\Export\InventarioExport;
use App\Http\Controllers\PDF\Inventario\InventarioJasperController;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class EstoquePdfController extends Controller
{
    protected $estoqueDAO, $itemEmpresa;

    public function __construct(EstoqueDAO $estoque_dao)
    {
        $this->estoqueDAO = $estoque_dao;
    }
    //Call home
    public function index(Request $request)
    {
        if (empty(Auth::User()->empresa_id)) {
            return view('pdf.estoque.home', ['empresa_id' => $request->input('empresa_id')]);
        }
        return view('pdf.estoque.home');
    }

    //Call home with a msg
    public function indexMsg()
    {
        if (empty(Auth::User()->empresa_id)) {
            return view('pdf.estoque.home', ['msgError' => "Nenhum inventário encontrado para gerar relatório !", 'empresa_id' => $this->itemEmpresa]);
        }

        return view('pdf.estoque.home', ['msgError' => "Nenhum inventário encontrado para gerar relatório !"]);
    }

    //Actions Menu
    public function actionsMenu(Request $request)
    {
        $this->itemEmpresa = empty(Auth::User()->empresa_id) ? $request->input('empresa_id') : Auth::User()->empresa_id;

        switch ($request->input('cbQuery')) {

            case "codigo":
                $this->validatedProdutoRelatorio($request);
                if (!$this->estoqueDAO->getLikeCodigoDAO($request->input('consulta'), $this->itemEmpresa)->count() == 0) {
                    return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
                } else {
                    return $this->indexMsg();
                }
                break;

            case "nomeProduto":
                $this->validatedProdutoRelatorio($request);
                if (!$this->estoqueDAO->getLikeNameDAO($request->input('consulta'), $this->itemEmpresa)->count() == 0) {
                    return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
                } else {
                    return $this->indexMsg();
                }
                break;

            case "fornecedor":
                $this->validatedProdutoRelatorio($request);
                if (!$this->estoqueDAO->getLikeFornecedorDAO($request->input('consulta'), $this->itemEmpresa)->count() == 0) {
                    return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
                } else {
                    return $this->indexMsg();
                }
                break;

            case "ean":
                $this->validatedProdutoRelatorio($request);
                if (!$this->estoqueDAO->getLikeEanDAO($request->input('consulta'), $this->itemEmpresa)->count() == 0) {
                    return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
                } else {
                    return $this->indexMsg();
                }
                break;

            case "subEspecie":
                $this->validatedProdutoRelatorio($request);
                if (!$this->estoqueDAO->getLikeSubEspecieDAO($request->input('consulta'), $this->itemEmpresa)->count() == 0) {
                    return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
                } else {
                    return view('pdf.estoque.home', ['msgError' => "Nenhum inventário encontrado para gerar relatório !"]);
                }
                break;

            case "lote":
                $this->validatedProdutoRelatorio($request);
                if (!$this->estoqueDAO->getLikeLoteDAO($request->input('consulta'), $this->itemEmpresa)->count() == 0) {
                    return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
                } else {
                    return $this->indexMsg();
                }
                break;

            case "endereco":
                $this->validatedProdutoRelatorio($request);
                if (!$this->estoqueDAO->getLikeEnderecoDAO($request->input('consulta'), $this->itemEmpresa)->count() == 0) {
                    return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
                } else {
                    return $this->indexMsg();
                }
                break;


            case "tipoEndereco":
                $this->validatedProdutoRelatorio($request);
                if (!$this->estoqueDAO->getLikeTipoEnderecoDAO($request->input('consulta'), $this->itemEmpresa)->count() == 0) {
                    return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
                } else {
                    return $this->indexMsg();
                }
                break;

            case "noFilter":
                if (!$this->estoqueDAO->getAllDAO($this->itemEmpresa)->count() == 0) {
                    return $this->getPdfOrExcelReport($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
                } else {
                    return $this->indexMsg();
                }
                break;
        }
    }

    public function getPdfOrExcelReport($extension, $option, $query)
    {
        if ($extension == "excel") {
            return $this->getExcelReport($option, $query);
        } else {
            return $this->getPdfReport($option, $query);
        }
    }


    //Verify if´s empty
    public function validatedProdutoRelatorio($dados)
    {
        $validated = $dados->validate([
            'consulta'  => 'required',
        ]);
    }

    //Excel----------------------------------

    public function getExcelReport($option, $query)
    {
        $report = new InventarioExport($option, $query, $this->itemEmpresa);
        return $report->getReportExcel();
    }



    //PDF----------------------------------
    public function  getPdfReport($opton, $query)
    {
        ini_set('max_execution_time', '999'); // 300 = 5 seconds
        ini_set("memory_limit", '999M');

        switch ($opton) {

            case "noFilter":
                return PDF::loadView('pdf.estoque.estoquePDF', ['dados'  => $this->estoqueDAO->getAllDAO($this->itemEmpresa)])
                    ->download('Relatório de Inventário.pdf');
                break;

            case "codigo":
                return PDF::loadView('pdf.estoque.estoquePDF', ['dados'  => $this->estoqueDAO->getLikeCodigoDAO($query, $this->itemEmpresa)])
                    ->download('Relatório de Inventário.pdf');
                break;

            case "nomeProduto":
                return PDF::loadView('pdf.estoque.estoquePDF', ['dados'  => $this->estoqueDAO->getLikeNameDAO($query, $this->itemEmpresa)])
                    ->download('Relatório de Inventário.pdf');

                break;

            case "fornecedor":
                return PDF::loadView('pdf.estoque.estoquePDF', ['dados'  => $this->estoqueDAO->getLikeFornecedorDAO($query, $this->itemEmpresa)])
                    ->download('Relatório de Inventário.pdf');
                break;

            case "ean":
                return PDF::loadView('pdf.estoque.estoquePDF', ['dados'  => $this->estoqueDAO->getLikeEanDAO($query, $this->itemEmpresa)])
                    ->download('Relatório de Inventário.pdf');

                break;

            case "subEspecie":
                return PDF::loadView('pdf.estoque.estoquePDF', ['dados'  => $this->estoqueDAO->getLikeSubEspecieDAO($query, $this->itemEmpresa)])
                    ->download('Relatório de Inventário.pdf');
                break;

            case "lote":
                return PDF::loadView('pdf.estoque.estoquePDF', ['dados'  => $this->estoqueDAO->getLikeLoteDAO($query, $this->itemEmpresa)])
                    ->download('Relatório de Inventário.pdf');
                break;

            case "endereco":
                return PDF::loadView('pdf.estoque.estoquePDF', ['dados'  => $this->estoqueDAO->getLikeEnderecoDAO($query, $this->itemEmpresa)])
                    ->download('Relatório de Inventário.pdf');
                break;

            case "tipoEndereco":
                return PDF::loadView('pdf.estoque.estoquePDF', ['dados'  => $this->estoqueDAO->getLikeTipoEnderecoDAO($query, $this->itemEmpresa)])
                    ->download('Relatório de Inventário.pdf');
                break;
        }
    }
}
