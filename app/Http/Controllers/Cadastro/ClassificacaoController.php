<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\ClassificacaoDAO;
use App\Models\Configuracao\EmpresaDAO;
use Illuminate\Support\Facades\Auth;

class ClassificacaoController extends Controller
{
    protected $classificacaoDAO, $empresaDAO;
    protected  $classificacaoPath     = 'dashboard.cadastro.classificacao.classificacao';
    protected  $classificacaoFormPath = 'dashboard.cadastro.classificacao.classificacaoForm';


    public function __construct(ClassificacaoDAO $classificacaoDAO, EmpresaDAO $empresaDAO)
    {
        $this->classificacaoDAO = $classificacaoDAO;
        $this->empresaDAO       = $empresaDAO;
    }

    public function validatedClassificacao($dados)
    {
        return  $validated = $dados->validate([
            'empresa_id' => 'required',
            'nome'       => 'required',
        ]);
    }

    public function index()
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view($this->classificacaoPath, ['dadosClassificacao' => $this->classificacaoDAO->getAllDAO(Auth::User()->empresa_id), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view($this->classificacaoPath, ['dadosClassificacao' => $this->classificacaoDAO->getAllDAO(Auth::User()->empresa_id)]);
    }

    public function classificacaoForm()
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view($this->classificacaoFormPath, ['dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view($this->classificacaoFormPath);
    }

    public function classificacaoEditForm($id)
    {
        $data = $this->classificacaoDAO->getByIdDAO($id, Auth::User()->empresa_id);
        if($data->count() > 0){
          return view('dashboard.cadastro.classificacao.classificacaoForm', ['dadosClassificacao' => $data]);
        }

        return redirect()->route('dashboard.cadastro.classificacao');
    }

    public function classificacaoEditFormToAdm($id, $empresa_id)
    {
        $data = $this->classificacaoDAO->getByIdDAO($id, $empresa_id);
        if($data->count() > 0){
          return view('dashboard.cadastro.classificacao.classificacaoForm', ['dadosClassificacao' => $data, 'dadosEmpresa' => $this->empresaDAO->getAllList(), 'empresaSelected' => $empresa_id]);
        }

        return redirect()->route('dashboard.cadastro.classificacao');
    }

    public function btnAction(Request $request)
    {
        $checkReturn = false;
        switch ($request->input('btnAction')) {
            case "btnAdd":
                if (!empty(Auth::User()->empresa_id)) {
                    $request->merge(['empresa_id' => Auth::User()->empresa_id]);
                }
                $this->validatedClassificacao($request);
                $this->classificacaoDAO->addDAO($request->all());
                $checkReturn = true;
                break;
            case "btnEdit":
                $this->validatedClassificacao($request);
                $this->classificacaoDAO->editDAO($request->input('id'), $request->except(['_token', 'btnAction']));
                $checkReturn = true;
                break;
            case "btnRemove":
                $this->classificacaoDAO->removeDAO($request->input('id'));
                $checkReturn = true;
                break;
        }

        if($checkReturn)
        return redirect()->route('dashboard.cadastro.classificacao');
    }

    public function getClassificationFilter(Request $request)
    {
        $dados = $this->classificacaoDAO->getByNameDAO($request->input('textSearch'), Auth::User()->empresa_id);
        return view($this->classificacaoPath, ['dadosClassificacao' => $dados]);
    }

    public function checkBeforeFilterToAdm(Request $request){
        if($request->input('btnAction') == "allQuery"){
           return view($this->classificacaoPath, ['dadosClassificacao' => $this->classificacaoDAO->getAllDAO($request->input('empresa_id')), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

       return $this->getClassificationFilterToAdm($request);
    }

    public function getClassificationFilterToAdm($request)
    {
        $dados = $this->classificacaoDAO->getByNameDAO($request->input('textSearch'), $request->input('empresa_id'));
        return view($this->classificacaoPath, ['dadosClassificacao' => $dados, 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
    }
}
