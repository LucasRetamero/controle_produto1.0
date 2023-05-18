<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EnderecoDAO;
use App\Models\Configuracao\EmpresaDAO;
use Illuminate\Support\Facades\Auth;

class EnderecoController extends Controller
{
    protected $enderecoDAO, $empresaDAO;

    public function __construct(EnderecoDAO $endereco_dao, EmpresaDAO $empresaDAO)
    {
        $this->enderecoDAO = $endereco_dao;
        $this->empresaDAO  = $empresaDAO;
    }

    //Returning list with all Lote
    public function index()
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getAllDAO(Auth::User()->empresa_id), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getAllDAO(Auth::User()->empresa_id)]);
    }

    public function addForm(){
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.endereco.enderecoForm', ['dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view('dashboard.cadastro.endereco.enderecoForm');
    }

    //Actions to add/edit or remove
    public function actionsMenu(Request $request)
    {
        switch ($request->input('btnAction')) {
            case "btnAdd":
                if (!empty(Auth::User()->empresa_id)) {
                    $request->merge(['empresa_id' => Auth::User()->empresa_id]);
                }
                $this->validatedLote($request);
                $this->enderecoDAO->addDAO($request->all());
                return $this->getEnderecoFormWithMsg("Endereço cadastrado com sucesso !", $request->input('empresa_id'));
                break;

            case "btnEdit":
                $this->validatedLote($request);
                $this->enderecoDAO->editDAO($request->input('id'), $request->except(['_token', 'btnAction']));
                return $this->getEnderecoFormWithMsg("Endereço editado com sucesso !", $request->input('empresa_id'));
                break;

            case "btnRemove":
                $this->validatedLote($request);
                $this->enderecoDAO->removeDAO($request->input('id'));
                return $this->getEnderecoFormWithMsg("Endereço removido com sucesso !", $request->input('empresa_id'));
                break;
        }
    }

    //Edit/Remove actions from table
    public function editRemoveTable($id, $option)
    {
        switch ($option) {

            case "edit":
                $data = $this->enderecoDAO->getIdDAO($id, Auth::User()->empresa_id);
                if ($data->count() > 0) {
                    return view('dashboard.cadastro.endereco.enderecoForm', ['dadosEndereco' => $data]);
                } else {
                    return redirect()->route('dashboard.cadastro.endereco');
                }
                break;

            case "remove":
                $this->enderecoDAO->removeDAO($id);
                break;
        }
        return $this->index();
    }

    public function editRemoveTableToAdm($id, $option, $empresa_id)
    {
        switch ($option) {

            case "edit":
                $data = $this->enderecoDAO->getIdDAO($id, $empresa_id);
                if ($data->count() > 0) {
                    return view('dashboard.cadastro.endereco.enderecoForm', ['dadosEndereco' => $data, 'empresaSelected' => $empresa_id, 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
                } else {
                    return redirect()->route('dashboard.cadastro.endereco');
                }
                break;

            case "remove":
                $this->enderecoDAO->removeDAO($id);
                break;
        }
        return $this->index();
    }


    //Searching menu
    public function searchingAction(Request $request)
    {
        switch ($request->input('btnAction')) {
            case "nameQuery":
                return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getLikeEnderecoAll($request->input('enderecoQuery'), Auth::User()->empresa_id)]);
                break;

            case "allQuery":
                return $this->index();
                break;
        }
    }

    public function checkSearchingToAdm(Request $request)
    {
        if ($request->input('empresa_id') == "000") {
            return redirect()->route('dashboard.cadastro.endereco');
        }
        return $this->searchingActionToAdm($request);
    }

    public function searchingActionToAdm($request)
    {
        switch ($request->input('btnAction')) {
            case "nameQuery":
                return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getLikeEnderecoAll($request->input('enderecoQuery'), $request->input('empresa_id')), "itemSelected" => $request->input('empresa_id'), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
                break;

            case "allQuery":
                return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getAllDAO($request->input('empresa_id')), "itemSelected" => $request->input('empresa_id'), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
                break;
        }
    }

    //Validated Lote
    public function validatedLote($dados)
    {
        $validated = $dados->validate([
            'empresa_id' => 'required',
            'endereco'   => 'required',
        ]);
    }

    //Return Endereço form with a message
    public function getEnderecoFormWithMsg($msg, $empresa_id)
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.endereco.enderecoForm', ['msgSuccess' => $msg, 'empresaSelected' => $empresa_id, 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }
        return view('dashboard.cadastro.endereco.enderecoForm', ['msgSuccess' => $msg]);
    }
}
