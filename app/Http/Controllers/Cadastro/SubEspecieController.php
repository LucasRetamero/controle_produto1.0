<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\SubEspecieDAO;
use Illuminate\Support\Facades\Auth;
use App\Models\Configuracao\EmpresaDAO;

class SubEspecieController extends Controller
{
    private $subEspecieDAO, $empresaDAO;

    public function __construct(SubEspecieDAO $subEspecie_dao, EmpresaDAO $empresaDAO)
    {
        $this->subEspecieDAO = $subEspecie_dao;
        $this->empresaDAO = $empresaDAO;
    }

    //Return list of Sub_Escpecie
    public function index()
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.subEspecie.subEspecie', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(Auth::User()->empresa_id), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view('dashboard.cadastro.subEspecie.subEspecie', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(Auth::User()->empresa_id)]);
    }

    public function addForm()
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.subEspecie.subEspecieForm', ['dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view('dashboard.cadastro.subEspecie.subEspecieForm');
    }

    //Actions to add\update\remove and cancel
    public function actionsMenu(Request $request)
    {
        switch ($request->input('btnAction')) {
            case "btnAdd":
                if (!empty(Auth::User()->empresa_id)) {
                  $request->merge(['empresa_id' => Auth::User()->empresa_id]);
                }
                $this->validatedProduct($request);
                $this->subEspecieDAO->addSubEspecie($request->except(['_token', 'btnAction']));
                return $this->getSubEspecieFormWithMsg("Sub-Especie cadastrada com sucesso !", $request->input('empresa_id'));
                break;

            case "btnEdit":
                $this->validatedProduct($request);
                $this->subEspecieDAO->updateSub($request->input('id'), $request->except(['_token', 'btnAction']));
                return $this->getSubEspecieFormWithMsg("Sub-Especie editada com sucesso !", $request->input('empresa_id'));
                break;

            case "btnRemove":
                $this->subEspecieDAO->deleteSub($request->input('id'));
                return $this->getSubEspecieFormWithMsg("Sub-Especie deletada com sucesso !", $request->input('empresa_id'));
                break;

            case "btnCancel":
                return redirect()->route('dashboard.cadastro.subEspecie');
                break;
        }
    }

    //Validated Produto
    public function validatedProduct($dados)
    {
        $validated = $dados->validate([
            'empresa_id'   => 'required',
            'sub_especie'  => 'required',
        ]);
    }

    //Open form to edit info
    public function editForm($id)
    {
        $data = $this->subEspecieDAO->getOneSub($id, Auth::User()->empresa_id);
        if($data->count() > 0){
            return view('dashboard.cadastro.subEspecie.subEspecieForm', ['dadosSubEspecie' => $data]);
        }

        return redirect()->route('dashboard.cadastro.subEspecie');
    }

    public function editFormToAdm($id, $empresa_id)
    {
        $data = $this->subEspecieDAO->getOneSub($id, $empresa_id);
        if($data->count() > 0){
            return view('dashboard.cadastro.subEspecie.subEspecieForm', ['dadosSubEspecie' => $data, 'empresaSelected' => $empresa_id, 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return redirect()->route('dashboard.cadastro.subEspecie');
    }

    //Detele by url
    public function getDeleteByUrl($id)
    {
        $this->subEspecieDAO->deleteSub($id);
        return redirect()->route('dashboard.cadastro.subEspecie');
    }

    //Search by sub especie
    public function searchBySubEspecie(Request $request)
    {
        switch ($request->input('btnAction')) {
            case "nameQuery":
                return view('dashboard.cadastro.subEspecie.subEspecie', ['dadosSubEspecie' => $this->subEspecieDAO->getAllBySubEspecie($request->input('sub_especie'), Auth::User()->empresa_id)]);
                break;

            case "allQuery":
                return view('dashboard.cadastro.subEspecie.subEspecie', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(Auth::User()->empresa_id)]);
                break;
        }
    }

    public function checkSearchingToAdm(Request $request)
    {
        if ($request->input('empresa_id') == "000") {
            return redirect()->route('dashboard.cadastro.subEspecie');
        }
        return $this->searchBySubEspecieToAdm($request);
    }

    public function searchBySubEspecieToAdm($request)
    {
        switch ($request->input('btnAction')) {
            case "nameQuery":
                return view('dashboard.cadastro.subEspecie.subEspecie', ['dadosSubEspecie' => $this->subEspecieDAO->getAllBySubEspecie($request->input('sub_especie'), $request->input('empresa_id')), "itemSelected" => $request->input('empresa_id'), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
                break;

            case "allQuery":
                return view('dashboard.cadastro.subEspecie.subEspecie', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie($request->input('empresa_id')), "itemSelected" => $request->input('empresa_id'), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
                break;
        }
    }

    //Return form Sub Especie with message
    public function getSubEspecieFormWithMsg($msg, $empresa_id)
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.subEspecie.subEspecieForm', ['msgSuccess' => $msg, "itemSelected" => $empresa_id, 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }
        return view('dashboard.cadastro.subEspecie.subEspecieForm', ['msgSuccess' => $msg, "itemSelected" => $empresa_id, 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
    }
}
