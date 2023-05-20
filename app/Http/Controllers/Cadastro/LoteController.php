<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\LoteDAO;
use App\Models\Configuracao\EmpresaDAO;
use Illuminate\Support\Facades\Auth;

class LoteController extends Controller
{
    protected $loteDAO, $empresaDAO, $itemEmpresa;

    public function __construct(LoteDAO $lote_dao, EmpresaDAO $empresa_dao)
    {
        $this->loteDAO = $lote_dao;
        $this->empresaDAO = $empresa_dao;
    }

    //Returning list with all Lote
    public function index()
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO(Auth::User()->empresa_id), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }
        return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO(Auth::User()->empresa_id)]);
    }

    public function indexToForm(Request $request)
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.lote.loteForm', ['empresa_id' => $request->input('empresa_id')]);
        }
        return view('dashboard.cadastro.lote.loteForm');
    }

    //Actions to add/edit or remove
    public function actionsMenu(Request $request)
    {
        $this->itemEmpresa = empty(Auth::User()->empresa_id) ? $request->input('empresa_id') : Auth::User()->empresa_id;

        switch ($request->input('btnAction')) {
            case "btnAdd":
                if (!empty(Auth::User()->empresa_id)) {
                    $request->merge(['empresa_id' => Auth::User()->empresa_id]);
                }
                $this->validatedLote($request);
                $this->loteDAO->addDAO($request->all());
                break;

            case "btnEdit":
                $this->validatedLote($request);
                $this->loteDAO->editDAO($request->input('id'), $request->except(['_token', 'btnAction']));
                break;

            case "btnRemove":
                $this->validatedLote($request);
                $this->loteDAO->removeDAO($request->input('id'));
                break;
        }

        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO($this->itemEmpresa), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO($this->itemEmpresa)]);
    }

    //Edit/Remove actions from table
    public function editRemoveLoteTable($id, $option, $empresa_id)
    {
        switch ($option) {

            case "edit":
                return view('dashboard.cadastro.lote.loteForm', ['dadosLote' => $this->loteDAO->getIdDAO($id, $empresa_id)]);
                break;

            case "remove":
                $this->loteDAO->removeDAO($id);
                break;
        }

        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO($this->itemEmpresa), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO($empresa_id)]);
    }


    //Searching menu
    public function searchingAction(Request $request)
    {
        $this->itemEmpresa = empty(Auth::User()->empresa_id) ? $request->input('empresa_id') : Auth::User()->empresa_id;

        switch ($request->input('btnAction')) {
            case "nameQuery":
                if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
                    return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getLikeNameDAO($request->input('lote'), $this->itemEmpresa), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
                }

                return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getLikeNameDAO($request->input('lote'), $this->itemEmpresa)]);
                break;

            case "allQuery":
                if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
                    return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO($this->itemEmpresa), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
                }

                return view('dashboard.cadastro.lote.lote', ['dadosLote' => $this->loteDAO->getAllDAO($this->itemEmpresa)]);
                break;
        }
    }

    //Validated Lote
    public function validatedLote($dados)
    {
        $validated = $dados->validate([
            'empresa_id' => 'required',
            'lote'  => 'required',
        ]);
    }
}
