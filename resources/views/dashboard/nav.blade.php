<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky bg-primary">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active bg-light text-primary font-weight-bold" href="{{ route('dashboard') }}">
                    <img src="{{ asset('img/icons/dashbaordIcon.png') }}" style="filter: white(100%);" width="20px"
                        height="20px"></img>
                    Home<span class="sr-only"></span>
                </a>
            </li>

            @if (Auth::User()->nivel_acesso == 'administrador' || Auth::User()->nivel_acesso == 'gerencia')
                <div id="main-menu" class="list-group">
                    <a href="#sub-menu" class="list-group-item bg-white font-weight-bold" data-toggle="collapse"
                        data-parent="#main-menu"><img src="{{ asset('img/icons/addIcon.png') }}" width="20px"
                            height="20px"></img> Cadastro <span class="caret"></span></a>
                    <div class="collapse list-group-level1" id="sub-menu">
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
                            class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                            Tipo Endereço</a>
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

            <div id="main-menu" class="list-group">
                <a href="#sub-menu" class="list-group-item bg-white font-weight-bold" data-toggle="collapse"
                    data-parent="#main-menu"><img src="{{ asset('img/icons/FilterIcon.png') }}" width="20px"
                        height="20px"></img> Consulta <span class="caret"></span></a>
                <div class="collapse list-group-level1" id="sub-menu">
                    <a href="{{ route('dashboard.cadastro.produto') }}"
                        class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                        Produto</a>
                    <a href="{{ route('dashboard.cadastro.endereco') }}"
                        class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                        Endereço</a>
                    <a href="{{ route('dashboard.cadastro.subEspecie') }}"
                        class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                        Sub-Especie</a>
                    <a href="{{ route('dashboard.cadastro.lote') }}"
                        class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                        Lote</a>
                    <a href="{{ route('dashboard.cadastro.tipo_endereco') }}"
                        class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Tipo
                        Endereço</a>
                    <a href="{{ route('dashboard.cadastro.estoque') }}"
                        class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                        Logistico</a>
                    <a href="{{ route('dashboard.cadastro.classificacao') }}"
                        class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                        Classificação</a>
                </div>
            </div>

            <div id="main-menu" class="list-group">
                <a href="#sub-menu" class="list-group-item bg-white font-weight-bold" data-toggle="collapse"
                    data-parent="#main-menu"><img src="{{ asset('img/icons/documentManIcon.png') }}" width="20px"
                        height="20px"></img> Relatório<span class="caret"></span></a>
                <div class="collapse list-group-level1" id="sub-menu">
                    @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                        <a href="" class="list-group-item font-weight-bold bg-primary text-white"
                            data-parent="#sub-menu" data-toggle="modal"
                            data-target="#businessListToProductReportModal">-
                            Produto</a>
                        <a href="" class="list-group-item font-weight-bold bg-primary text-white"
                            data-parent="#sub-menu" data-toggle="modal"
                            data-target="#businessListToAddressReportModal">-
                            Endereço</a>
                        <a href="" class="list-group-item font-weight-bold bg-primary text-white"
                            data-parent="#sub-menu" data-toggle="modal"
                            data-target="#businessListToInventoryReportModal">-
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

            <div id="main-menu" class="list-group">
                <a href="#sub-menu" class="list-group-item bg-white font-weight-bold" data-toggle="collapse"
                    data-parent="#main-menu"><img src="{{ asset('img/icons/configurationIcon.png') }}"
                        width="20px" height="20px"></img> Configuração <span class="caret"></span></a>
                <div class="collapse list-group-level1" id="sub-menu">
                    @if (Auth::User()->nivel_acesso == 'administrador')
                        <a href="{{ route('dashboard.configuracao.usuarios') }}"
                            class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu"> -
                            Usuários</a>
                    @endif
                    @if (Auth::User()->nivel_acesso == 'administrador' && Auth::User()->empresa_id == '')
                        <a href="{{ route('dashboard.configuracao.empresa') }}"
                            class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu"> -
                            Empresa</a>
                    @endif
                </div>
            </div>

        </ul>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
        aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

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
