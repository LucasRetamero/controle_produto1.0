<style type="text/css">
    .anyClass {
        height: 150px;
        overflow-y: scroll;
    }
</style>

<nav class="navbar navbar-dark fixed-top bg-light flex-md-nowrap p-0 shadow">

    <a class="navbar-brand col-sm-3 col-md-2 mr-0 bg-light text-primary" href="{{ route('dashboard') }}"><img
            src="{{ asset('img/icons/product.png') }}" width="30px" height="30px">
        <font size="4px"> Fazendo Logistica</font>
    </a>
    @if (Auth::User()->nivel_acesso == 'administrador' || Auth::User()->nivel_acesso == 'gerencia')
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('img/icons/addIcon.png') }}" width="25px" height="25x"></img>Cadastrar
            </button>
            <div class="dropdown-menu anyClass" aria-labelledby="dropdownMenuButton">
                @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                    <a href="" class="list-group-item font-weight-bold bg-primary text-white"
                        data-parent="#sub-menu" data-toggle="modal" data-target="#businessListToProductModal">-
                        Produto</a>
                @else
                    <a href="{{ route('dashboard.cadastro.produto.productAddForm') }}"
                        class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                        Produto</a>
                @endif
                <a href="{{ route('dashboard.cadastro.endereco.enderecoAddForm') }}"
                    class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                    Endereço</a>
                <a href="{{ route('dashboard.cadastro.subEspecie.subEspecieAddForm') }}"
                    class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                    Sub-Especie</a>
                @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                    <a href="" class="list-group-item font-weight-bold bg-primary text-white"
                        data-parent="#sub-menu" data-toggle="modal" data-target="#businessListLoteModal">-
                        Lote</a>
                @else
                    <a href="{{ route('dashboard.cadastro.lote.loteAddForm') }}"
                        class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                        Lote</a>
                @endif
                <a href="{{ route('dashboard.cadastro.tipo_endereco.tipoEnderecoAddForm') }}"
                    class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Tipo
                    Endereço</a>
                @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                    <a class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu"
                        data-toggle="modal" data-target="#businessListModal">-
                        Logistico</a>
                @else
                    <a href="{{ route('dashboard.cadastro.estoque.estoqueAddForm') }}"
                        class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                        Logistico</a>
                @endif
                <a href="{{ route('dashboard.cadastro.classificacao.form') }}"
                    class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                    Classificação</a>
            </div>
        </div>
    @endif

    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('img/icons/FilterIcon.png') }}" width="25px" height="25x"></img>Consultar
        </button>
        <div class="dropdown-menu anyClass" aria-labelledby="dropdownMenuButton">
            <a href="{{ route('dashboard.cadastro.produto') }}"
                class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Produto</a>
            <a href="{{ route('dashboard.cadastro.endereco') }}"
                class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Endereço</a>
            <a href="{{ route('dashboard.cadastro.subEspecie') }}"
                class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Sub-Especie</a>
            <a href="{{ route('dashboard.cadastro.lote') }}"
                class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                Lote</a>
            <a href="{{ route('dashboard.cadastro.tipo_endereco') }}"
                class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Tipo
                Endereço</a>
            <a href="{{ route('dashboard.cadastro.estoque') }}"
                class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Logistico</a>
            <a href="{{ route('dashboard.cadastro.classificacao') }}"
                class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                Classificação</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('img/icons/documentManIcon.png') }}" width="25px" height="25x"></img>Relatório
        </button>
        <div class="dropdown-menu anyClass" aria-labelledby="dropdownMenuButton">
            @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                <a href="" class="list-group-item font-weight-bold bg-primary text-white"
                    data-parent="#sub-menu" data-toggle="modal" data-target="#businessListToProductReportModal">-
                    Produto</a>
                <a href="" class="list-group-item font-weight-bold bg-primary text-white"
                    data-parent="#sub-menu" data-toggle="modal" data-target="#businessListToAddressReportModal">-
                    Endereço</a>
                <a href="" class="list-group-item font-weight-bold bg-primary text-white"
                    data-parent="#sub-menu" data-toggle="modal" data-target="#businessListToInventoryReportModal">-
                    Inventário</a>
                <a href="" class="list-group-item font-weight-bold bg-primary text-white"
                    data-parent="#sub-menu" data-toggle="modal"
                    data-target="#businessListToIssueProductReportModal">-
                    Apuração de Ocorrencia</a>
            @else
                <a href="{{ route('dashboard.pdf.produtos.configurarPdf') }}"
                    class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                    Produto</a>
                <a href="{{ route('dashboard.pdf.endereco.configurarPdf') }}"
                    class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                    Endereço</a>
                <a href="{{ route('dashboard.pdf.estoque.configurarPdf') }}"
                    class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                    Inventário</a>
                <a href="{{ route('dashboard.pdf.apuracao_ocorrencia.configurarPdf') }}"
                    class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                    Apuração de Ocorrencia</a>
            @endif
        </div>
    </div>

    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('img/icons/configurationIcon.png') }}" width="25px"
                height="25x"></img>Configuração
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @if (Auth::User()->nivel_acesso == 'administrador')
                <a href="{{ route('dashboard.configuracao.usuarios') }}"
                    class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Login</a>
            @endif
            @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                <a href="{{ route('dashboard.configuracao.empresa') }}"
                    class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu"> -
                    Empresa</a>
            @endif
        </div>
    </div>
    <form method="get" action="{{ route('login.deslogar') }}">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">

                <a href="#"><button type="submit" class="btn btn-danger"><img
                            src="{{ asset('img/icons/iconClose.png') }}" width="25px"
                            height="25x"></img>Deslogar</button></a>
            </li>
        </ul>
    </form>
</nav>

@if (empty(Auth::User()->empresa_id))
    <div class="modal fade" id="businessListLoteModal" tabindex="-1" role="dialog"
        aria-labelledby="businessListModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Lista de Empresas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" action="{{ route('dashboard.cadastro.lote.loteAddForm') }}">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group">
                            <select class="form-control" id="cb_empresa_list" name="empresa_id" required>
                                <option value="" selected disabled>Selecione a Empresa</option>
                                @foreach (app('App\Http\Controllers\Configuracao\EmpresaController')->getEmpresaList() as $item)
                                    <option value="{{ $item->id }}">{{ $item->razao_social }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Selecionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if (empty(Auth::User()->empresa_id))
    <div class="modal fade" id="businessListModal" tabindex="-1" role="dialog"
        aria-labelledby="businessListModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Lista de Empresas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('dashboard.estoque.formulario.add.adm') }}">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group">
                            <select class="form-control" id="cb_empresa_list" name="empresa_id" required>
                                <option value="" selected disabled>Selecione a Empresa</option>
                                @foreach (app('App\Http\Controllers\Configuracao\EmpresaController')->getEmpresaList() as $item)
                                    <option value="{{ $item->id }}">{{ $item->razao_social }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Selecionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if (empty(Auth::User()->empresa_id))
    <div class="modal fade" id="businessListToProductModal" tabindex="-1" role="dialog"
        aria-labelledby="businessListModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Lista de Empresas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('dashboard.produtos.form.adm') }}">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group">
                            <select class="form-control" id="cb_empresa_list" name="empresa_id" required>
                                <option value="" selected disabled>Selecione a Empresa</option>
                                @foreach (app('App\Http\Controllers\Configuracao\EmpresaController')->getEmpresaList() as $item)
                                    <option value="{{ $item->id }}">{{ $item->razao_social }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Selecionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if (empty(Auth::User()->empresa_id))
    <div class="modal fade" id="businessListToProductReportModal" tabindex="-1" role="dialog"
        aria-labelledby="businessListModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Lista de Empresas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" action="{{ route('dashboard.pdf.produtos.configurarPdf') }}">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group">
                            <select class="form-control" id="cb_empresa_list" name="empresa_id" required>
                                <option value="" selected disabled>Selecione a Empresa</option>
                                @foreach (app('App\Http\Controllers\Configuracao\EmpresaController')->getEmpresaList() as $item)
                                    <option value="{{ $item->id }}">{{ $item->razao_social }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Selecionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if (empty(Auth::User()->empresa_id))
    <div class="modal fade" id="businessListToAddressReportModal" tabindex="-1" role="dialog"
        aria-labelledby="businessListModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Lista de Empresas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" action="{{ route('dashboard.pdf.endereco.configurarPdf') }}">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group">
                            <select class="form-control" id="cb_empresa_list" name="empresa_id" required>
                                <option value="" selected disabled>Selecione a Empresa</option>
                                @foreach (app('App\Http\Controllers\Configuracao\EmpresaController')->getEmpresaList() as $item)
                                    <option value="{{ $item->id }}">{{ $item->razao_social }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Selecionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if (empty(Auth::User()->empresa_id))
    <div class="modal fade" id="businessListToInventoryReportModal" tabindex="-1" role="dialog"
        aria-labelledby="businessListModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Lista de Empresas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" action="{{ route('dashboard.pdf.estoque.configurarPdf') }}">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group">
                            <select class="form-control" id="cb_empresa_list" name="empresa_id" required>
                                <option value="" selected disabled>Selecione a Empresa</option>
                                @foreach (app('App\Http\Controllers\Configuracao\EmpresaController')->getEmpresaList() as $item)
                                    <option value="{{ $item->id }}">{{ $item->razao_social }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Selecionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if (empty(Auth::User()->empresa_id))
    <div class="modal fade" id="businessListToIssueProductReportModal" tabindex="-1" role="dialog"
        aria-labelledby="businessListModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Lista de Empresas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" action="{{ route('dashboard.pdf.apuracao_ocorrencia.configurarPdf') }}">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group">
                            <select class="form-control" id="cb_empresa_list" name="empresa_id" required>
                                <option value="" selected disabled>Selecione a Empresa</option>
                                @foreach (app('App\Http\Controllers\Configuracao\EmpresaController')->getEmpresaList() as $item)
                                    <option value="{{ $item->id }}">{{ $item->razao_social }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Selecionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
