<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\ProdutosDAO;
use App\Models\Export\ProdutoExport;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class ProdutosPdfController extends Controller
{
    protected $produtosDAO, $itemEmpresa;

    public function __construct(ProdutosDAO $produtos_dao)
    {
        $this->produtosDAO   = $produtos_dao;
    }

    //Call home produtos
    public function index(Request $request)
    {
        if (empty(Auth::User()->empresa_id)) {
            return view('pdf.produtos.home', ['empresa_id' => $request->input('empresa_id')]);
        }
        return view('pdf.produtos.home');
    }

    public function indexErrorMsg($msg)
    {
        if (empty(Auth::User()->empresa_id)) {
            return view('pdf.produtos.home', ['msgError' => $msg, 'empresa_id' => $this->itemEmpresa]);
        }

        return view('pdf.produtos.home', ['msgError' => $msg]);
    }


    //Actions Menu
    public function actionsMenu(Request $request)
    {
        $this->itemEmpresa = empty(Auth::User()->empresa_id) ? $request->input('empresa_id') : Auth::User()->empresa_id;

        switch ($request->input('cbQuery')) {

            case "nome":

                $this->validatedProdutoRelatorio($request);
                if ($this->produtosDAO->getByNomeDAO($request->input('consulta'), (empty(Auth::User()->empresa_id)) ? $this->itemEmpresa : Auth::User()->empresa_id)->count() == 0) {
                    return $this->indexErrorMsg("Nenhum produto encontrado para gerar relatório !");
                } else {
                    return $this->callReportXmlOrPdf($request->input('cbQuery'), $request->input('cbMode'), $request->input('consulta'));
                }
                break;

            case "codigo":
                $this->validatedProdutoRelatorio($request);
                if ($this->produtosDAO->getByCodigoDAO($request->input('consulta'), (empty(Auth::User()->empresa_id)) ? $this->itemEmpresa : Auth::User()->empresa_id)->count() == 0) {
                    return $this->indexErrorMsg("Nenhum produto encontrado para gerar relatório !");
                } else {
                    return $this->callReportXmlOrPdf($request->input('cbQuery'), $request->input('cbMode'), $request->input('consulta'));
                }
                break;

            case "ean":
                $this->validatedProdutoRelatorio($request);
                if ($this->produtosDAO->getByEanDAO($request->input('consulta'), (empty(Auth::User()->empresa_id)) ? $this->itemEmpresa : Auth::User()->empresa_id)->count() == 0) {
                    return $this->indexErrorMsg("Nenhum produto encontrado para gerar relatório !");
                } else {
                    return $this->callReportXmlOrPdf($request->input('cbQuery'), $request->input('cbMode'), $request->input('consulta'));
                }
                break;

            case "fornecedor":
                $this->validatedProdutoRelatorio($request);
                if ($this->produtosDAO->getByFornecedorDAO($request->input('consulta'), (empty(Auth::User()->empresa_id)) ? $this->itemEmpresa : Auth::User()->empresa_id)->count() == 0) {
                    return $this->indexErrorMsg("Nenhum produto encontrado para gerar relatório !");
                } else {
                    return $this->callReportXmlOrPdf($request->input('cbQuery'), $request->input('cbMode'), $request->input('consulta'));
                }
                break;

            case "subEspecie":
                $this->validatedProdutoRelatorio($request);
                if ($this->produtosDAO->getBySubEspecieDAO($request->input('consulta'), (empty(Auth::User()->empresa_id)) ? $this->itemEmpresa : Auth::User()->empresa_id)->count() == 0) {
                    return $this->indexErrorMsg("Nenhum produto encontrado para gerar relatório !");
                } else {
                    return $this->callReportXmlOrPdf($request->input('cbQuery'), $request->input('cbMode'), $request->input('consulta'));
                }
                break;

            case "noFilter":
                if ($this->produtosDAO->getAllProdutos((empty(Auth::User()->empresa_id)) ? $this->itemEmpresa : Auth::User()->empresa_id)->count() == 0) {
                    return $this->indexErrorMsg("Nenhum produto encontrado para gerar relatório !");
                } else {
                    return $this->callReportXmlOrPdf($request->input('cbQuery'), $request->input('cbMode'), $request->input('consulta'));
                }
                break;
        }
    }

    //Call PDF or XML
    public function callReportXmlOrPdf($options, $extension, $query)
    {
        if ($extension == "excel") {
            return $this->getExcelReport($options, $query);
        } else {
            return $this->getPdfReport($options, $query);
        }
    }

    //Verify if´s empty
    public function validatedProdutoRelatorio($dados)
    {
        $validated = $dados->validate([
            'consulta'  => 'required',
        ]);
    }


    //Excel Report --------
    public function getExcelReport($option, $query)
    {
        $report = new ProdutoExport($option, $query, $this->itemEmpresa);
        return $report->getReportExcel();
    }



    //PDF Report ----------
    public function  getPdfReport($opton, $query)
    {
        ini_set('max_execution_time', '999'); // 300 = 5 seconds
        ini_set("memory_limit", '999M');

        switch ($opton) {

            case "noFilter":
                return PDF::loadView('pdf.produtos.produtoPDF', ['dados' => $this->produtosDAO->getAllProdutos($this->itemEmpresa)])
                    ->setPaper('A4', 'landscape')
                    ->download('Relatório de Produtos.pdf');
                break;

            case "nome":
                return PDF::loadView('pdf.produtos.produtoPDF', ['dados'  => $this->produtosDAO->getByNomeDAO($query, $this->itemEmpresa)])
                    ->setPaper('A4', 'landscape')
                    ->download('Relatório de Produtos.pdf');
                break;

            case "codigo":
                return PDF::loadView('pdf.produtos.produtoPDF', ['dados'  => $this->produtosDAO->getByCodigoDAO($query, $this->itemEmpresa)])
                    ->setPaper('A4', 'landscape')
                    ->download('Relatório de Produtos.pdf');

                break;

            case "ean":
                return PDF::loadView('pdf.produtos.produtoPDF', ['dados'  => $this->produtosDAO->getByEanDAO($query, $this->itemEmpresa)])
                    ->setPaper('A4', 'landscape')
                    ->download('Relatório de Produtos.pdf');
                break;

            case "fornecedor":
                return PDF::loadView('pdf.produtos.produtoPDF', ['dados'  => $this->produtosDAO->getByFornecedorDAO($query, $this->itemEmpresa)])
                    ->setPaper('A4', 'landscape')
                    ->download('Relatório de Produtos.pdf');

                break;

            case "subEspecie":
                return PDF::loadView('pdf.produtos.produtoPDF', ['dados'  => $this->produtosDAO->getBySubEspecieDAO($query, $this->itemEmpresa)])
                    ->setPaper('A4', 'landscape')
                    ->download('Relatório de Produtos.pdf');
                break;
        }
    }
}
