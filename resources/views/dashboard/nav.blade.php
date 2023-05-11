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
                        <a href="{{ route('dashboard.cadastro.produto.productAddForm') }}"
                            class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                            Produto</a>
                        <a href="{{ route('dashboard.cadastro.endereco.enderecoAddForm') }}"
                            class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                            Endereço</a>
                        <a href="{{ route('dashboard.cadastro.subEspecie.subEspecieAddForm') }}"
                            class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                            Sub-Especie</a>
                        <a href="{{ route('dashboard.cadastro.tipo_endereco.tipoEnderecoAddForm') }}"
                            class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                            Tipo Endereço</a>
                        <a href="{{ route('dashboard.cadastro.estoque.estoqueAddForm') }}"
                            class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                            Logistico</a>
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
                    <a href="{{ route('dashboard.cadastro.tipo_endereco') }}"
                        class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Tipo
                        Endereço</a>
                    <a href="{{ route('dashboard.cadastro.estoque') }}"
                        class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">-
                        Logistico</a>
                </div>
            </div>

            <div id="main-menu" class="list-group">
                <a href="#sub-menu" class="list-group-item bg-white font-weight-bold" data-toggle="collapse"
                    data-parent="#main-menu"><img src="{{ asset('img/icons/documentManIcon.png') }}" width="20px"
                        height="20px"></img> Relatório<span class="caret"></span></a>
                <div class="collapse list-group-level1" id="sub-menu">
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
                </div>
            </div>

            <div id="main-menu" class="list-group">
                <a href="#sub-menu" class="list-group-item bg-white font-weight-bold" data-toggle="collapse"
                    data-parent="#main-menu"><img src="{{ asset('img/icons/configurationIcon.png') }}" width="20px"
                        height="20px"></img> Configuração <span class="caret"></span></a>
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
