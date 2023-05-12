<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\ClassificacaoDAO;
use Illuminate\Support\Facades\Auth;

class ClassificacaoController extends Controller
{
    protected $classificacaoDAO;
    protected  $classificacaoPath     = 'dashboard.cadastro.classificacao.classificacao';
    protected  $classificacaoFormPath = 'dashboard.cadastro.classificacao.classificacaoForm';


    public function __construct(ClassificacaoDAO $classificacaoDAO)
    {
        $this->classificacaoDAO = $classificacaoDAO;
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
        return view($this->classificacaoPath, ['dadosClassificacao' => $this->classificacaoDAO->getAllDAO()]);
    }

    public function classificacaoForm()
    {
        return view($this->classificacaoFormPath);
    }

    public function classificacaoEditForm($id)
    {
        $data = $this->classificacaoDAO->getByIdDAO($id);
        if($data->count() > 0){
          return view('dashboard.cadastro.classificacao.classificacaoForm', ['dadosClassificacao' => $data]);
        }

        return redirect()->route('dashboard.cadastro.classificacao');
    }

    public function btnAction(Request $request)
    {
        $checkReturn = false;
        switch ($request->input('btnAction')) {
            case "btnAdd":
                $request->merge(['empresa_id' => Auth::User()->empresa_id]);
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
        $dados = $this->classificacaoDAO->getByNameDAO($request->input('textSearch'));
        return view($this->classificacaoPath, ['dadosClassificacao' => $dados]);
    }
}
