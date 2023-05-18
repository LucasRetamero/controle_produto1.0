<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\ProdutosDAO;
use App\Models\Cadastro\LocalizacaoDAO;
use App\Models\Cadastro\SubEspecieDAO;
use App\Models\Cadastro\ClassificacaoDAO;
use App\Models\Configuracao\EmpresaDAO;
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{

    private $produtosDAO, $localizacaoDAO, $subEspecieDAO, $classificacaoDAO, $empresaDAO;

    public function __construct(
        ProdutosDAO $produtos_dao,
        LocalizacaoDAO $localizacao_dao,
        SubEspecieDAO $subEspecie_dao,
        ClassificacaoDAO $classificacaoDAO,
        EmpresaDAO $empresaDAO
    ) {
        $this->produtosDAO = $produtos_dao;
        $this->localizacaoDAO = $localizacao_dao;
        $this->subEspecieDAO = $subEspecie_dao;
        $this->classificacaoDAO = $classificacaoDAO;
        $this->empresaDAO = $empresaDAO;
    }

    //Lista de produto
    public function index()
    {
        if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.produto.produto', ['dados' => $this->produtosDAO->getAllProdutos(Auth::User()->empresa_id), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return view('dashboard.cadastro.produto.produto', ['dados' => $this->produtosDAO->getAllProdutos(Auth::User()->empresa_id)]);
    }

    //Formulario de produto
    public function indexFormProduto()
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.produto.produtoForm', [
                'dadosSubEspecie'  => $this->subEspecieDAO->getAllSubEspecie(Auth::User()->empresa_id),
                'dadosClassificacao' => $this->classificacaoDAO->getAllDAO(Auth::User()->empresa_id),
                'dadosEmpresa' => $this->empresaDAO->getAllList(),
            ]);
        }

        return view('dashboard.cadastro.produto.produtoForm', [
            'dadosSubEspecie'  => $this->subEspecieDAO->getAllSubEspecie(Auth::User()->empresa_id),
            'dadosClassificacao' => $this->classificacaoDAO->getAllDAO(Auth::User()->empresa_id),
        ]);
    }

    public function editFormProduto($id)
    {
        $data = $this->produtosDAO->getByIdDAO($id, Auth::User()->empresa_id);
        if ($data->count() > 0) {
            return view('dashboard.cadastro.produto.produtoForm', [
                'dadosProduto'       => $data,
                'dadosSubEspecie'    => $this->subEspecieDAO->getAllSubEspecie(Auth::User()->empresa_id),
                'dadosClassificacao' => $this->classificacaoDAO->getAllDAO(Auth::User()->empresa_id),
            ]);
        }

        return redirect()->route('dashboard.cadastro.produto');
    }

    public function editFormProdutoToAdm($id, $empresa_id)
    {
        $data = $this->produtosDAO->getByIdDAO($id, $empresa_id);
        if ($data->count() > 0) {
            return view('dashboard.cadastro.produto.produtoForm', [
                'dadosProduto'       => $data,
                'dadosSubEspecie'    => $this->subEspecieDAO->getAllSubEspecie($empresa_id),
                'dadosClassificacao' => $this->classificacaoDAO->getAllDAO($empresa_id),
                'dadosEmpresa' => $this->empresaDAO->getAllList(),
                'empresaSelected' => $empresa_id,
            ]);
        }

        return redirect()->route('dashboard.cadastro.produto');
    }

    //Validated Produto
    public function validatedProduct($dados)
    {
        $validated = $dados->validate([
            'codigo'        => 'required',
            'empresa_id'    => 'required',
            'nome'          => 'required',
            'ean'           => 'required',
            'fornecedor'    => 'required',
            'sub_especie'   => 'required',
            'referencia'    => 'required',
            'classificacao' => 'required',
            'etica'         => 'required',
        ]);
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
                $this->produtosDAO->addDAO($request->except(['_token', 'btnAction']));
                return $this->getProdutoFormReturnMsg("Produto cadastrado com sucesso !", $request);
                break;

            case "btnEdit":
                $this->produtosDAO->updateDAO($request->input('id'), $request->except(['_token', 'btnAction']));
                return $this->getProdutoFormReturnMsg("Produto editado com sucesso !", $request);
                break;

            case "btnRemove":
                $this->produtosDAO->removeDAO($request->input('id'));
                return $this->getProdutoFormReturnMsg("Produto deletado com sucesso !", $request);
                break;

            case "btnCancel":
                return redirect()->route('dashboard.cadastro.produto');
                break;
        }
    }

    //Searching produto
    public function searchingMenu(Request $request)
    {
        switch ($request->input('cbQuery')) {
            case "nome":
                $dados = $this->produtosDAO->getByNomeDAO($request->input('textSearch'),  Auth::User()->empresa_id);
                break;

            case "codigo":
                $dados = $this->produtosDAO->getByCodigoDAO($request->input('textSearch'), Auth::User()->empresa_id);
                break;

            case "ean":
                $dados = $this->produtosDAO->getByEanDAO($request->input('textSearch'), Auth::User()->empresa_id);
                break;

            case "fornecedor":
                $dados = $this->produtosDAO->getByFornecedorDAO($request->input('textSearch'), Auth::User()->empresa_id);
                break;

            case "subEspecie":
                $dados = $this->produtosDAO->getBySubEspecieDAO($request->input('textSearch'), Auth::User()->empresa_id);
                break;

            case "referencia":
                $dados = $this->produtosDAO->getByReferenciaeDAO($request->input('textSearch'), Auth::User()->empresa_id);
                break;

            case "classicacao":
                $dados = $this->produtosDAO->getByClassicacaoDAO($request->input('textSearch'), Auth::User()->empresa_id);
                break;

            case "etica":
                $dados = $this->produtosDAO->getByEticaDAO($request->input('textSearch'), Auth::User()->empresa_id);
                break;
        }

        return view('dashboard.cadastro.produto.produto', ['dados' => $dados]);
    }

    public function checkSearchingToAdm(Request $request)
    {
        if ($request->input('empresa_id') == "000") {
            $dados = $this->produtosDAO->getAllProdutos($request->input('empresa_id'));
            return view('dashboard.cadastro.produto.produto', ['dados' => $dados, 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        return $this->searchingMenuToAdm($request);
    }

    public function searchingMenuToAdm($request)
    {
        if ($request->input('btnAction') == "allQuery") {
            $dados = $this->produtosDAO->getAllProdutos($request->input('empresa_id'));
            return view('dashboard.cadastro.produto.produto', ['dados' => $dados, 'itemSelected' => $request->input('empresa_id'), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
        }

        switch ($request->input('cbQuery')) {
            case "nome":
                $dados = $this->produtosDAO->getByNomeDAO($request->input('textSearch'),  $request->input('empresa_id'));
                break;

            case "codigo":
                $dados = $this->produtosDAO->getByCodigoDAO($request->input('textSearch'), $request->input('empresa_id'));
                break;

            case "ean":
                $dados = $this->produtosDAO->getByEanDAO($request->input('textSearch'), $request->input('empresa_id'));
                break;

            case "fornecedor":
                $dados = $this->produtosDAO->getByFornecedorDAO($request->input('textSearch'), $request->input('empresa_id'));
                break;

            case "subEspecie":
                $dados = $this->produtosDAO->getBySubEspecieDAO($request->input('textSearch'), $request->input('empresa_id'));
                break;

            case "referencia":
                $dados = $this->produtosDAO->getByReferenciaeDAO($request->input('textSearch'), $request->input('empresa_id'));
                break;

            case "classicacao":
                $dados = $this->produtosDAO->getByClassicacaoDAO($request->input('textSearch'), $request->input('empresa_id'));
                break;

            case "etica":
                $dados = $this->produtosDAO->getByEticaDAO($request->input('textSearch'), $request->input('empresa_id'));
                break;
        }

        return view('dashboard.cadastro.produto.produto', ['dados' => $dados, 'itemSelected' => $request->input('empresa_id'), 'dadosEmpresa' => $this->empresaDAO->getAllList()]);
    }

    //Remove produto from table
    public function removeProduto($id)
    {
        $this->produtosDAO->getDelete($id);
        return redirect()->route('dashboard.cadastro.produto');
    }

    //Return produto from with a message
    public function getProdutoFormReturnMsg($msg, $request)
    {
        if (Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id)) {
            return view('dashboard.cadastro.produto.produtoForm', [
                'msgSuccess' => $msg, 'dadosSubEspecie' => $this->subEspecieDAO->getAllSubEspecie($request->input('empresa_id')),
                'dadosClassificacao' => $this->classificacaoDAO->getAllDAO($request->input('empresa_id')), 'dadosEmpresa' => $this->empresaDAO->getAllList(),
            ]);
        }

        return view('dashboard.cadastro.produto.produtoForm', [
            'msgSuccess' => $msg, 'dadosSubEspecie'    => $this->subEspecieDAO->getAllSubEspecie(Auth::User()->empresa_id),
            'dadosClassificacao' => $this->classificacaoDAO->getAllDAO(Auth::User()->empresa_id),
        ]);
    }
}
