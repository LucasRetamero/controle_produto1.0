<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cadastro\EstoqueDAO;
use App\Models\Cadastro\SubEspecieDAO;
use App\Models\Cadastro\EnderecoDAO;
use App\Models\Cadastro\ProdutosDAO;
use App\Models\Cadastro\TipoEnderecoDAO;
use App\Models\Cadastro\ClassificacaoDAO;
use App\Models\Cadastro\LoteDAO;
use App\Models\Configuracao\EmpresaDAO;


class EstoqueController extends Controller
{
    protected $estoqueDAO,
        $enderecoDAO,
        $subEspecieDAO,
        $produtoDAO,
        $tipoEnderecoDAO,
        $classificacaoDAO,
        $empresaDAO,
        $loteDAO;

    public function __construct(EstoqueDAO $estoque_dao, SubEspecieDAO $subEspecie_dao, EnderecoDAO $endereco_dao, ProdutosDAO $produtos_dao, TipoEnderecoDAO $tipoEndereco_dao, ClassificacaoDAO $classificacaoDAO, EmpresaDAO $empresaDAO, LoteDAO $loteDAO)
    {
        $this->estoqueDAO = $estoque_dao;
        $this->enderecoDAO = $endereco_dao;
        $this->subEspecieDAO = $subEspecie_dao;
        $this->produtoDAO = $produtos_dao;
        $this->tipoEnderecoDAO = $tipoEndereco_dao;
        $this->classificacaoDAO = $classificacaoDAO;
        $this->empresaDAO = $empresaDAO;
        $this->loteDAO = $loteDAO;
    }

    //return list of estoque
    public function index()
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.estoque.estoque', ['dados' => $this->estoqueDAO->getAllDAO(Auth::User()->empresa_id), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view('dashboard.cadastro.estoque.estoque', ['dados' => $this->estoqueDAO->getAllDAO(Auth::User()->empresa_id)]);
    }

    //Open estoque form
    public function getEstoqueForm()
    {
        $addressList = $this->getEnderecoAndVerify();
        return view('dashboard.cadastro.estoque.estoqueForm', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(Auth::User()->empresa_id), 'dadosEndereco' => $addressList, 'dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO(Auth::User()->empresa_id), 'dadosClassificacao' => $this->classificacaoDAO->getAllDAO(Auth::User()->empresa_id), 'dadosLote' => $this->loteDAO->getAllDAO(Auth::User()->empresa_id)]);
    }

    public function getEstoqueFormToAdm(Request $request)
    {
        $addressList = $this->getEnderecoAndVerifyToAdm($request->input('empresa_id'));
        return view('dashboard.cadastro.estoque.estoqueForm', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie($request->input('empresa_id')), 'dadosEndereco' => $addressList, 'dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO($request->input('empresa_id')), 'dadosClassificacao' => $this->classificacaoDAO->getAllDAO($request->input('empresa_id')), 'hasBusiness' => $request->input('empresa_id'), 'dadosLote' => $this->loteDAO->getAllDAO($request->input('empresa_id'))]);
    }

    //Get produt and return to estoque form
    public function getEstoqueFormWithProduct(Request $request)
    {
        $addressList = $this->getEnderecoAndVerify();
        if ($this->produtoDAO->getByCodigoDAO($request->input('nomeProdutoQuery'), Auth::User()->empresa_id)->count() > 0) {
            return view('dashboard.cadastro.estoque.estoqueForm', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(Auth::User()->empresa_id), 'dadosEndereco' => $addressList, 'dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO(Auth::User()->empresa_id), 'dadosClassificacao' => $this->classificacaoDAO->getAllDAO(Auth::User()->empresa_id), 'msgSuccess' => "Produto Encontrado !", 'dadosProduto' => $this->produtoDAO->getByCodigoDAO($request->input('nomeProdutoQuery'), Auth::User()->empresa_id), 'dadosLote' => $this->loteDAO->getAllDAO(Auth::User()->empresa_id)]);
        }

        return view('dashboard.cadastro.estoque.estoqueForm', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(Auth::User()->empresa_id), 'dadosEndereco' => $addressList, 'dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO(Auth::User()->empresa_id), 'dadosClassificacao' => $this->classificacaoDAO->getAllDAO(Auth::User()->empresa_id), 'msgError' => "Nenhum produto encontrado !", 'dadosLote' => $this->loteDAO->getAllDAO(Auth::User()->empresa_id)]);
    }

    public function getEstoqueFormWithProductToAdm(Request $request)
    {
        $addressList = $this->getEnderecoAndVerifyToAdm($request->input('empresa_id'));
        if ($this->produtoDAO->getByCodigoDAO($request->input('nomeProdutoQuery'),  $request->input('empresa_id'))->count() > 0) {
            return view('dashboard.cadastro.estoque.estoqueForm', [
                'dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie($request->input('empresa_id')),
                'dadosEndereco' => $addressList,
                'dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO($request->input('empresa_id')),
                'dadosClassificacao' => $this->classificacaoDAO->getAllDAO($request->input('empresa_id')),
                'msgSuccess' => "Produto Encontrado !",
                'dadosProduto' => $this->produtoDAO->getByCodigoDAO($request->input('nomeProdutoQuery'), $request->input('empresa_id')),
                'hasBusiness' => $request->input('empresa_id'),
                'dadosLote' => $this->loteDAO->getAllDAO($request->input('empresa_id'))
            ]);
        }

        return view('dashboard.cadastro.estoque.estoqueForm', [
            'dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie($request->input('empresa_id')),
            'dadosEndereco' => $addressList, 'dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO($request->input('empresa_id')),
            'dadosClassificacao' => $this->classificacaoDAO->getAllDAO($request->input('empresa_id')),
            'msgError' => "Nenhum produto encontrado !",
            'hasBusiness' => $request->input('empresa_id'),
            'dadosLote' => $this->loteDAO->getAllDAO($request->input('empresa_id'))
        ]);
    }

    //Menu of Actions
    public function actionsList(Request $request)
    {
        switch ($request->input('btnAction')) {
            case "btnAdd":
                if (!empty(Auth::User()->empresa_id)) {
                    $request->merge(['empresa_id' => Auth::User()->empresa_id]);
                }
                $this->validatedEstoque($request);
                $this->estoqueDAO->addEstoqueDAO($request->except(['_token', 'btnAction']));
                if (!empty(Auth::User()->empresa_id)) {
                    return $this->getEstoqueFormWithMsg("Logistica cadastrada com sucesso !");
                }
                    return $this->getEstoqueFormWithMsgToAdm("Logistica cadastrada com sucesso !", $request->input('empresa_id'));
                break;

            case "btnEdit":
                $this->validatedEstoque($request);
                $this->estoqueDAO->updateEstoqueDAO($request->input('id'), $request->except(['_token', 'btnAction']));
                if (!empty(Auth::User()->empresa_id)) {
                    return $this->getEstoqueFormWithMsg("Logistica editada com sucesso !");
                }
                    return $this->getEstoqueFormWithMsgToAdm("Logistica editada com sucesso !", $request->input('empresa_id'));
                break;

            case "btnRemove":
                $this->estoqueDAO->removeEstoqueDAO($request->input('id'));
                if (!empty(Auth::User()->empresa_id)) {
                    return $this->getEstoqueFormWithMsg("Logistica deletada com sucesso !");
                }
                    return $this->getEstoqueFormWithMsgToAdm("Logistica deletada com sucesso !", $request->input('empresa_id'));
                break;
        }
    }

    //List Actions from table
    public function actionsListeTable($id, $option)
    {
        switch ($option) {
            case "edit":
                $data = $this->estoqueDAO->getIdEstoqueDAO($id, Auth::User()->empresa_id);
                if ($data->count() > 0) {
                    $addressList = $this->getEnderecoAndVerify();
                    return view('dashboard.cadastro.estoque.estoqueForm', ['dadosLogistico' => $data, 'dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(Auth::User()->empresa_id), 'dadosEndereco' => $addressList, 'dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO(Auth::User()->empresa_id), 'dadosClassificacao' => $this->classificacaoDAO->getAllDAO(Auth::User()->empresa_id), 'dadosLote' => $this->loteDAO->getAllDAO(Auth::User()->empresa_id)]);
                }
                return redirect()->route('dashboard.cadastro.estoque');
                break;

            case "remove":
                $this->estoqueDAO->removeEstoqueDAO($id);
                return $this->index();
                break;
        }
    }

    //Searching menu
    public function searchingMenu(Request $request)
    {
        switch ($request->input('tipoQuery')) {
            case "nome":
                return view('dashboard.cadastro.estoque.estoque', ['dados' => $this->estoqueDAO->getLikeNameDAO($request->input('textoQuery'), Auth::User()->empresa_id)]);
                break;

            case "codigo":
                return view('dashboard.cadastro.estoque.estoque', ['dados' => $this->estoqueDAO->getLikeCodigoDAO($request->input('textoQuery'), Auth::User()->empresa_id)]);
                break;

            case "ean":
                return view('dashboard.cadastro.estoque.estoque', ['dados' => $this->estoqueDAO->getLikeEanDAO($request->input('textoQuery'), Auth::User()->empresa_id)]);
                break;

            case "lote":
                return view('dashboard.cadastro.estoque.estoque', ['dados' => $this->estoqueDAO->getLikeLoteDAO($request->input('textoQuery'), Auth::User()->empresa_id)]);
                break;

            case "endereco":
                return view('dashboard.cadastro.estoque.estoque', ['dados' => $this->estoqueDAO->getLikeEnderecoDAO($request->input('textoQuery'), Auth::User()->empresa_id)]);
                break;

            case "tipo_endereco":
                return view('dashboard.cadastro.estoque.estoque', ['dados' => $this->estoqueDAO->getLikeTipoEnderecoDAO($request->input('textoQuery'), Auth::User()->empresa_id)]);
                break;

            case "allQuery":
                return $this->index();
                break;
        }
    }

    public function checkSearchingToAdm(Request $request)
    {
        if ($request->input('empresa_id') == "000") {
            return redirect()->route('dashboard.cadastro.estoque');
        }

        return $this->searchingMenuToAdm($request);
    }

    public function checkBeforeSearchingToAdm(Request $request)
    {
        if ($request->input('btnAction') == "allQuery") {
            $dados = $this->estoqueDAO->getAllDAO($request->input('empresa_id'));
            return view('dashboard.cadastro.estoque.estoque', ['dados' => $dados, 'dadosEmpresa' => $this->empresaDAO->getAllList(), 'itemSelected' => $request->input('empresa_id'), 'hasBusiness' => $request->input('empresa_id')]);
        }

        return $this->searchingMenuToAdm($request);
    }

    public function searchingMenuToAdm($request)
    {
        switch ($request->input('tipoQuery')) {
            case "nome":
                $dados = $this->estoqueDAO->getLikeNameDAO($request->input('textoQuery'), $request->input('empresa_id'));
                break;

            case "codigo":
                $dados = $this->estoqueDAO->getLikeCodigoDAO($request->input('textoQuery'),  $request->input('empresa_id'));
                break;

            case "ean":
                $dados = $this->estoqueDAO->getLikeEanDAO($request->input('textoQuery'),  $request->input('empresa_id'));
                break;

            case "lote":
                $dados = $this->estoqueDAO->getLikeLoteDAO($request->input('textoQuery'),  $request->input('empresa_id'));
                break;

            case "endereco":
                $dados = $this->estoqueDAO->getLikeEnderecoDAO($request->input('textoQuery'),  $request->input('empresa_id'));
                break;

            case "tipo_endereco":
                $dados = $this->estoqueDAO->getLikeTipoEnderecoDAO($request->input('textoQuery'),  $request->input('empresa_id'));
                break;
        }

        if ($request->input('btnAction') == "allQuery") {
            $dados = $this->estoqueDAO->getAllDAO($request->input('empresa_id'));
            return view('dashboard.cadastro.estoque.estoque', ['dados' => $dados, 'dadosEmpresa' => $this->empresaDAO->getAllList(), 'itemSelected' => $request->input('empresa_id'), 'hasBusiness' => $request->input('empresa_id')]);
        }

        return view('dashboard.cadastro.estoque.estoque', ['dados' => $dados, 'dadosEmpresa' => $this->empresaDAO->getAllList(), 'itemSelected' => $request->input('empresa_id'), 'hasBusiness' => $request->input('empresa_id')]);
    }

    public function editForm($id, $empresa_id)
    {
        $data = $this->estoqueDAO->getIdEstoqueDAO($id, $empresa_id);
        if ($data->count() > 0) {
            $addressList = $this->getEnderecoAndVerifyToAdm($empresa_id);
            return view('dashboard.cadastro.estoque.estoqueForm', ['dadosLogistico' => $data, 'dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie($empresa_id), 'dadosEndereco' => $addressList, 'dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO($empresa_id), 'dadosClassificacao' => $this->classificacaoDAO->getAllDAO($empresa_id), 'hasBusiness' => $empresa_id, 'dadosLote' => $this->loteDAO->getAllDAO($empresa_id)]);
        }

        return redirect()->route('dashboard.cadastro.estoque');
    }

    //Validated Estoque
    public function validatedEstoque($dados)
    {
        $validated = $dados->validate([
            'codigo'         => 'required',
            'empresa_id'     => 'required',
            'nome_produto'   => 'required',
            'ean'            => 'required',
            'fornecedor'     => 'required',
            'sub_especie'    => 'required',
            'referencia'     => 'required',
            'classificacao'  => 'required',
            'etica'          => 'required',
            'lote'           => 'required',
            'endereco'       => 'required',
            'tipo_endereco'  => 'required',
        ]);
    }

    //Return estoque form with a message
    public function getEstoqueFormWithMsg($msg)
    {
        $addressList = $this->getEnderecoAndVerify();
        return view('dashboard.cadastro.estoque.estoqueForm', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie(Auth::User()->empresa_id), 'dadosEndereco' => $addressList, 'dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO(Auth::User()->empresa_id), 'dadosClassificacao' => $this->classificacaoDAO->getAllDAO(Auth::User()->empresa_id), 'msgSuccess' => $msg, 'dadosLote' => $this->loteDAO->getAllDAO(Auth::User()->empresa_id)]);
    }
    public function getEstoqueFormWithMsgToAdm($msg, $empresa_id)
    {
        $addressList = $this->getEnderecoAndVerifyToAdm($empresa_id);
        return view('dashboard.cadastro.estoque.estoqueForm', ['dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie($empresa_id), 'dadosEndereco' => $addressList, 'dadosTipoEndereco' => $this->tipoEnderecoDAO->getAllDAO($empresa_id), 'dadosClassificacao' => $this->classificacaoDAO->getAllDAO($empresa_id), 'msgSuccess' => $msg, 'hasBusiness' => $empresa_id, 'dadosLote' => $this->loteDAO->getAllDAO($empresa_id)]);
    }

    public function getEnderecoAndVerify()
    {
        $addressList = [];
        $addressList[] = ['id' => 000, 'endereco' => '----- Endereços Vazios ----'];
        //Verify empty
        foreach ($this->enderecoDAO->getAllDAO(Auth::User()->empresa_id) as $item) {
            if ($this->estoqueDAO->getListEnderecoDAO($item->endereco, Auth::User()->empresa_id)->count() == 0) {
                $addressList[] = ['id' => $item->id, 'endereco' => $item->endereco];
            }
        }
        $addressList[] = ['id' => 000, 'endereco' => '----- Endereços Ocupados ----'];
        //Verify used
        foreach ($this->enderecoDAO->getAllDAO(Auth::User()->empresa_id) as $item) {
            if ($this->estoqueDAO->getListEnderecoDAO($item->endereco, Auth::User()->empresa_id)->count() > 0) {
                $addressList[] = ['id' => $item->id, 'endereco' => $item->endereco];
            }
        }
        return $addressList;
    }
    public function getEnderecoAndVerifyToAdm($empresa_id)
    {
        $addressList = [];
        $addressList[] = ['id' => 000, 'endereco' => '----- Endereços Vazios ----'];
        //Verify empty
        foreach ($this->enderecoDAO->getAllDAO($empresa_id) as $item) {
            if ($this->estoqueDAO->getListEnderecoDAO($item->endereco, $empresa_id)->count() == 0) {
                $addressList[] = ['id' => $item->id, 'endereco' => $item->endereco];
            }
        }
        $addressList[] = ['id' => 000, 'endereco' => '----- Endereços Ocupados ----'];
        //Verify used
        foreach ($this->enderecoDAO->getAllDAO($empresa_id) as $item) {
            if ($this->estoqueDAO->getListEnderecoDAO($item->endereco, $empresa_id)->count() > 0) {
                $addressList[] = ['id' => $item->id, 'endereco' => $item->endereco];
            }
        }
        return $addressList;
    }
}
