<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\EnderecoDAO;
use Illuminate\Support\Facades\Auth;

class EnderecoController extends Controller
{
    protected $enderecoDAO;

    public function __construct(EnderecoDAO $endereco_dao)
    {
        $this->enderecoDAO = $endereco_dao;
    }

    //Returning list with all Lote
    public function index()
    {
        return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getAllDAO()]);
    }

    //Actions to add/edit or remove
    public function actionsMenu(Request $request)
    {
        switch ($request->input('btnAction')) {
            case "btnAdd":
                $request->merge(['empresa_id' => Auth::User()->empresa_id]);
                $this->validatedLote($request);
                $this->enderecoDAO->addDAO($request->all());
                return $this->getEnderecoFormWithMsg("Endereço cadastrado com sucesso !");
                break;

            case "btnEdit":
                $this->validatedLote($request);
                $this->enderecoDAO->editDAO($request->input('id'), $request->except(['_token', 'btnAction']));
                return $this->getEnderecoFormWithMsg("Endereço editado com sucesso !");
                break;

            case "btnRemove":
                $this->validatedLote($request);
                $this->enderecoDAO->removeDAO($request->input('id'));
                return $this->getEnderecoFormWithMsg("Endereço removido com sucesso !");
                break;
        }
    }

    //Edit/Remove actions from table
    public function editRemoveTable($id, $option)
    {
        switch ($option) {

            case "edit":
                $data = $this->enderecoDAO->getIdDAO($id);
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


    //Searching menu
    public function searchingAction(Request $request)
    {
        switch ($request->input('btnAction')) {
            case "nameQuery":
                return view('dashboard.cadastro.endereco.endereco', ['dadosEndereco' => $this->enderecoDAO->getLikeEnderecoAll($request->input('enderecoQuery'))]);
                break;

            case "allQuery":
                return $this->index();
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
    public function getEnderecoFormWithMsg($msg)
    {
        return view('dashboard.cadastro.endereco.enderecoForm', ['msgSuccess' => $msg]);
    }
}
