<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EnderecoDAO;
use App\Models\Export\EnderecoExport;
use App\Http\Controllers\PDF\Endereco\EnderecoJasperController;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class EnderecoPdfController extends Controller
{
    protected $enderecoDAO, $itemEmpresa;

    public function __construct(EnderecoDAO $endereco_dao)
    {
        $this->enderecoDAO = $endereco_dao;
    }

    //Get Home endereco
    public function index(Request $request)
    {
        if (empty(Auth::User()->empresa_id)) {
            return view('pdf.endereco.home', ['empresa_id' => $request->input('empresa_id')]);
        }
        return view('pdf.endereco.home');
    }

    //Get return with msg
    public function indexWthMsg()
    {
        if (empty(Auth::User()->empresa_id)) {
            return view('pdf.endereco.home', ['msgError' => "Nenhum endereço encontrado para gerar relatório !", 'empresa_id' => $this->itemEmpresa]);
        }

        return view('pdf.endereco.home', ['msgError' => "Nenhum endereço encontrado para gerar relatório !"]);
    }

    //Actions Menu
    public function actionsMenu(Request $request)
    {
        $this->itemEmpresa = empty(Auth::User()->empresa_id) ? $request->input('empresa_id') : Auth::User()->empresa_id;

        switch ($request->input('cbQuery')) {

            case "endereco":
                $this->validatedEnderecoRelatorio($request);
                if (!$this->enderecoDAO->getLikeEnderecoAll($request->input('consulta'), $this->itemEmpresa)->count() == 0) {
                    return $this->getPdfOrExcel($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
                } else {
                    return $this->indexWthMsg();
                }
                break;

            case "noFilter":
                if ($this->enderecoDAO->getAllDAO($this->itemEmpresa)->count() > 0) {
                    return $this->getPdfOrExcel($request->input('cbMode'), $request->input('cbQuery'), $request->input('consulta'));
                } else {
                    return $this->indexWthMsg();
                }
                break;
        }
    }

    //Return pdf or excel report
    public function getPdfOrExcel($extension, $option, $query)
    {
        if ($extension == "excel") {
            return $this->getExcelReport($option, $query);
        } else {
            return $this->getPdfReport($option, $query);
        }
    }

    //Verify if´s empty
    public function validatedEnderecoRelatorio($dados)
    {
        $validated = $dados->validate([
            'consulta'  => 'required',
        ]);
    }


    //Excel----------------------------------
    public function getExcelReport($option, $query)
    {
        $report = new EnderecoExport($option, $query, $this->itemEmpresa);
        return $report->getReportExcel();
    }


    //PDF----------------------------------
    public function  getPdfReport($opton, $query)
    {
        ini_set('max_execution_time', '999'); // 300 = 5 seconds
        ini_set("memory_limit", '999M');

        switch ($opton) {

            case "noFilter":
                return PDF::loadView('pdf.endereco.enderecoPDF', ['dados'  => $this->enderecoDAO->getAllDAO($this->itemEmpresa)])
                    ->download('Relatório de Endereço.pdf');
                break;

            case "endereco":
                return PDF::loadView('pdf.endereco.enderecoPDF', ['dados'  => $this->enderecoDAO->getLikeEnderecoAll($query, $this->itemEmpresa)])
                    ->download('Relatório de Endereço.pdf');
                break;
        }
    }
}
