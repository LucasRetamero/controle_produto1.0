<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\TipoEnderecoDAO;
use Illuminate\Support\Facades\Auth;
use App\Models\Configuracao\EmpresaDAO;

class TipoEnderecoController extends Controller
{
    protected $tipoEnderecoDAO, $empresaDAO;


    public function __construct(TipoEnderecoDAO $tipoEndereco_dao, EmpresaDAO $empresaDAO)
    {
        $this->tipoEnderecoDAO = $tipoEndereco_dao;
        $this->empresaDAO = $empresaDAO;
    }

    //Returning list with all Lote
    public function index()
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO(Auth::User()->empresa_id), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO(Auth::User()->empresa_id)]);
    }

    public function formtoAdd()
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.tipoEndereco.tipoEnderecoForm', ['dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }
        return view('dashboard.cadastro.tipoEndereco.tipoEnderecoForm');
    }

    //Actions to add/edit or remove
    public function actionsMenu(Request $request)
    {
        switch ($request->input('btnAction')) {
            case "btnAdd":
                if (!empty(Auth::User()->empresa_id)) {
                    $request->merge(['empresa_id' => Auth::User()->empresa_id]);
                }
                $this->validatedTipoEndereco($request);
                $this->tipoEnderecoDAO->addDAO($request->all());
                break;

            case "btnEdit":
                $this->validatedTipoEndereco($request);
                $this->tipoEnderecoDAO->editDAO($request->input('id'), $request->except(['_token', 'btnAction']));
                break;

            case "btnRemove":
                $this->validatedTipoEndereco($request);
                $this->tipoEnderecoDAO->removeDAO($request->input('id'));
                break;
        }

        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO(Auth::User()->empresa_id), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO(Auth::User()->empresa_id)]);
    }

    //Edit/Remove actions from table
    public function editRemoveLoteTable($id, $option)
    {
        switch ($option) {

            case "edit":
                $data = $this->tipoEnderecoDAO->getIdDAO($id, Auth::User()->empresa_id);
                if ($data->count() > 0) {
                    return view('dashboard.cadastro.tipoEndereco.tipoEnderecoForm', ['dadosTipoEndereco' => $data]);
                }
                return redirect()->route('dashboard.cadastro.tipo_endereco');
                break;

            case "remove":
                $this->tipoEnderecoDAO->removeDAO($id);
                break;
        }

        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO(Auth::User()->empresa_id), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO(Auth::User()->empresa_id)]);
    }

    public function editRemoveLoteTableToAdm($id, $empresa_id)
    {
        $data = $this->tipoEnderecoDAO->getIdDAO($id, $empresa_id);
        if ($data->count() > 0) {
            return view('dashboard.cadastro.tipoEndereco.tipoEnderecoForm', ['dadosTipoEndereco' => $data, 'dadosEmpresa' => $this->empresaDAO->getAllList(), 'empresaSelected' => $empresa_id]);
        }
        return redirect()->route('dashboard.cadastro.tipo_endereco');
    }


    //Searching menu
    public function searchingAction(Request $request)
    {
        switch ($request->input('btnAction')) {
            case "nameQuery":
                return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getLikeNameDAO($request->input('tipo_endereco'), Auth::User()->empresa_id)]);
                break;

            case "allQuery":
                return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO(Auth::User()->empresa_id)]);
                break;
        }
    }

    public function checkSearchingToAdm(Request $request)
    {
        if ($request->input('empresa_id') == "000") {
            return redirect()->route('dashboard.cadastro.tipoEndereco', ['dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }
        return $this->searchingActionToAdm($request);
    }

    public function searchingActionToAdm($request)
    {
        switch ($request->input('btnAction')) {
            case "nameQuery":
                return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getLikeNameDAO($request->input('tipo_endereco'), $request->input('empresa_id')), 'dadosEmpresa' => $this->empresaDAO->getAllList(), 'itemSelected' => $request->input('empresa_id')]);
                break;

            case "allQuery":
                return view('dashboard.cadastro.tipoEndereco.tipoEndereco', ['dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO($request->input('empresa_id')), 'dadosEmpresa' => $this->empresaDAO->getAllList(), 'itemSelected' => $request->input('empresa_id')]);
                break;
        }
    }

    //Validated Lote
    public function validatedTipoEndereco($dados)
    {
        $validated = $dados->validate([
            'empresa_id'     => 'required',
            'tipo_endereco'  => 'required',
        ]);
    }
}
