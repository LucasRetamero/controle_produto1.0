@extends('dashboard.default')

@section('title', 'Fazendo Logistica - Dashboard')

@section('content')
    <!-- CSS from page -->
    <style type="text/css">
        thead {
            background-color: #6095EB;
            color: #FFF;
            font-size: large;
        }

        td {
            font-size: large;
            font-weight: bolder;
        }

        #btnUpdate,
        #btnRemove {
            display: inline-block;
            vertical-align: top;
        }

        .imgIcons {
            width: 30px;
            height: 30px;
        }

        .hiddenDiv {
            display: none;
        }

        .showDiv {
            display: block;
        }
    </style>

    <div class="container">
        <h1 class="h2">Consultar / Logistica</h1>
        <hr style="border-top:3px solid #000">
    </div>

    @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id) && isset($dadosEmpresa))
        <div class="modal fade" id="businessListToSend" tabindex="-1" role="dialog" aria-labelledby="businessListToSendlLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Lista de Empresas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('dashboard.estoque.list.filtered.adm') }}">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <div class="form-group">
                                <input type="hidden" name="textoQuery" id="txtCodigoToSend" value="" />
                                <input type="hidden" name="tipoQuery" id="txtOptionToSend" value="" />
                                <input type="hidden" name="btnAction" id="btnActionToSend" value="" />
                                <select class="form-control" id="cb_empresa_list" name="empresa_id" required>
                                    <option value="" selected disabled>Selecione a Empresa</option>
                                    @foreach ($dadosEmpresa as $item)
                                        <option value="{{ $item->id }}">{{ $item->razao_social }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
            @if (isset($hasBusiness))
                <form class="bg-primary w-50 mx-auto" method="post"
                    action="{{ route('dashboard.estoque.list.filtered.adm') }}">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <input type="hidden" name="tipoQuery" value="codigo" />
                    <input type="hidden" name="empresa_id" value="{{ $hasBusiness }}" />
                    <label for="staticEmail" class="text-nowrap text-white h5">Codigo do produto</label>
                    <input type="text" class="form-control" id="nameSearchOrigin" name="textoQuery"
                        placeholder="Digite o codigo do produto e pressione ENTER...">
                    <center><button type="submit" class="btn btn-primary font-weight-bold text-white" name="btnAction"
                            value="code"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons" />
                            Consultar</button>
                        <button type="submit" class="btn btn-primary font-weight-bold text-white" name="btnAction"
                            value="allQuery"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons" /> Buscar
                            Todos</button>
                    </center>
                </form>
            @else
                <form class="bg-primary w-50 mx-auto">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <label for="staticEmail" class="text-nowrap text-white h5">Codigo do produto</label>
                    <input type="text" class="form-control" id="txtCodigoToOtherModel" name="textoQuery" placeholder="Digite o codigo do produto e pressione ENTER...">
                    <center><button type="button" class="btn btn-primary font-weight-bold text-white" name="btnAction"
                            value="code" data-toggle="modal" data-target="#businessListToSend" onClick="sendInfoToModal('codigo')"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons" />
                            Consultar</button>
                        <button type="button" class="btn btn-primary font-weight-bold text-white" name="btnAction"
                            value="allQuery" data-toggle="modal" data-target="#businessListToSend" onClick="sendInfoToModal('allQuery')"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons" />
                            Buscar
                            Todos</button>
                    </center>
                </form>
            @endif
        @else
            <form class="bg-primary w-50 mx-auto"  method="post" action="{{ route('dashboard.cadastro.estoque.searching') }}">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="tipoQuery" value="codigo" />
                <label for="staticEmail" class="text-nowrap text-white h5">Codigo do produto</label>
                <input type="text" class="form-control" id="nameSearchOrigin" name="textoQuery"
                    placeholder="Digite o codigo do produto e pressione ENTER..." required autofocus>
                    <center><button type="submit" class="btn btn-primary font-weight-bold text-white"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons"/> Consultar</button>
                        <a href="{{ route('dashboard.cadastro.estoque') }}" class="btn btn-primary font-weight-bold"><img src="{{ asset('img/icons/iconGroup.png') }}" class="imgIcons"/> Buscar Todos</a></center>
            </form>
        @endif
    </div>


    <!-- buttons actions -->
    <div id="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="h3">Menu</h1>
                @if (Auth::User()->nivel_acesso == 'administrador' || Auth::User()->nivel_acesso == 'gerencia')
                    @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                        <button type="button" id="btnAddProduct" class="btn btn-success font-weight-bold text-white"
                            data-toggle="modal" data-target="#myModal">
                            <img src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons" /> Adicionar novo
                        </button>
                    @else
                        <a href="{{ route('dashboard.cadastro.estoque.estoqueAddForm') }}"><button id="btnAddProduct"
                                class="btn btn-success font-weight-bold text-white"><img
                                    src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons" /> Adicionar
                                novo</button></a>
                    @endif
                @endif
                <button id="btnQueryUser" class="btn btn-primary font-weight-bold text-white"
                    onClick="hiddenOrShowQuerUser()"><img src="{{ asset('img/icons/FilterIcon.png') }}"
                        class="imgIcons" />
                    Filtrar</button>
            </div>
        </div>
    </div>

    </br>
    @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id) && isset($dadosEmpresa))
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
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
                                    @foreach ($dadosEmpresa as $item)
                                        <option value="{{ $item->id }}">{{ $item->razao_social }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Adicionar Novo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Filter user List -->
    <div id="containerQuery" class="hiddenDiv">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="h3">Consultar lista logistica</h1>
                @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                    <form method="post" action="{{ route('dashboard.estoque.filter.adm') }}">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                        <div class="form-row">

                            <div class="col2">
                                <div class="form-group">
                                    <select class="form-control" id="slctQuery" name="tipoQuery">
                                        <option value="nome" selected>Nome do Produto</option>
                                        <option value="codigo">Codigo</option>
                                        <option value="ean">EAN</option>
                                        <option value="lote">Lote</option>
                                        <option value="endereco">Endereço</option>
                                        <option value="tipo_endereco">Tipo Endereço</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div id="searchInput" class="form-group">
                                    <input type="text" id="nameSearchOrigin" name="textoQuery" class="form-control"
                                        placeholder="Digite a informação desejada para realizar a consulta...">
                                </div>
                            </div>

                        </div>

                        <h1 class="h4">Lista de Empresas</h1>
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <select class="form-control" id="cb_empresaId" name="empresa_id">
                                    <option value="000" selected disabled>Seleciona a Empresa...</option>
                                    @foreach ($dadosEmpresa as $item)
                                        @if (isset($dadosEmpresa) && isset($itemSelected) && $itemSelected == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->razao_social }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->razao_social }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" name="btnAction" value="nameQuery"
                            class="btn btn-primary font-weight-bold"><img src="{{ asset('img/icons/FilterIcon.png') }}"
                                class="imgIcons" /> Iniciar consulta</button>
                        <button type="submit" name="btnAction" value="allQuery"
                            class="btn btn-success font-weight-bold"><img src="{{ asset('img/icons/FilterIcon.png') }}"
                                class="imgIcons" /> Buscar Todos</button>
                    </form>
                @else
                    <form method="post" action="{{ route('dashboard.cadastro.estoque.searching') }}">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                        <div class="form-row">

                            <div class="col2">
                                <div class="form-group">
                                    <select class="form-control" id="slctQuery" name="tipoQuery">
                                        <option value="nome" selected>Nome do Produto</option>
                                        <option value="codigo">Codigo</option>
                                        <option value="ean">EAN</option>
                                        <option value="lote">Lote</option>
                                        <option value="endereco">Endereço</option>
                                        <option value="tipo_endereco">Tipo Endereço</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div id="searchInput" class="form-group">
                                    <input type="text" id="nameSearchOrigin" name="textoQuery" class="form-control"
                                        placeholder="Digite a informação desejada para realizar a consulta..." required
                                        autofocus>
                                </div>
                            </div>

                        </div>

                        <button type="submit" name="btnAction" value="nameQuery"
                            class="btn btn-primary font-weight-bold"><img src="{{ asset('img/icons/FilterIcon.png') }}"
                                class="imgIcons" /> Iniciar consulta</button>
                        <a href="{{ route('dashboard.cadastro.estoque') }}" class="btn btn-primary font-weight-bold"><img
                                src="{{ asset('img/icons/iconGroup.png') }}" class="imgIcons" /> Buscar Todos</a>

                    </form>
                @endif
            </div>
        </div>
    </div>

    </br>
    <!-- Table of users -->
    <table class="table">
        <h1 class="h3 text-center">Lista da logistica</h1>
        <thead class="thead">
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nome produto</th>
                <th scope="col">EAN</th>
                <th scope="col">Lote</th>
                <th scope="col">Endereço</th>
                <th scope="col">Tipo Endereço</th>
                @if (Auth::User()->nivel_acesso == 'administrador' || Auth::User()->nivel_acesso == 'gerencia')
                    <th scope="col">Menu</th>
                @endif

            </tr>
        </thead>
        <tbody>
            @if ($dados->count() > 0)
                @foreach ($dados as $item)
                    <tr>
                        <th scope="row">{{ $item->codigo }}</th>
                        <td>{{ $item->nome_produto }}</td>
                        <td>{{ $item->ean }}</td>
                        <td>{{ $item->lote }}</td>
                        <td class="text-nowrap">{{ $item->endereco }}</td>
                        <td>{{ $item->tipo_endereco }}</td>
                        <td>
                            <div class="row">
                                <!-- buttons edit /  remove-->
                                <div class="col-sm-12 text-center">
                                    @if (Auth::User()->nivel_acesso == 'administrador' || Auth::User()->nivel_acesso == 'gerencia')
                                        @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                                            <a
                                                href="{{ route('dashboard.estoque.formulario.adm', ['id' => $item->id, 'empresa_id' => $item->empresa_id]) }}"><button
                                                    id="btnUpdate" class="btn btn-warning btn-md center-block"
                                                    name="btnAction" value="btnEdit"><img
                                                        src="{{ asset('img/icons/editIcon.png') }}" class="imgIcons" />
                                                    Editar</button></a>
                                            <a href="{{ route('dashboard.cadastro.estoque.actionsList', ['id' => $item->id, 'option' => 'remove']) }}"
                                                onclick="return confirm('Deseja realmente remover esse item ?')"><button
                                                    id="btnUpdate" class="btn btn-danger btn-md center-block"
                                                    name="btnAction" value="btnRemove"><img
                                                        src="{{ asset('img/icons/removeIcon.png') }}" class="imgIcons"
                                                        value="{{ $item->id }}" /> Remover</button></a>
                                        @else
                                            <a
                                                href="{{ route('dashboard.cadastro.estoque.actionsList', ['id' => $item->id, 'option' => 'edit']) }}"><button
                                                    id="btnUpdate" class="btn btn-warning btn-md center-block"
                                                    name="btnAction" value="btnEdit"><img
                                                        src="{{ asset('img/icons/editIcon.png') }}" class="imgIcons" />
                                                    Editar</button></a>
                                            <a href="{{ route('dashboard.cadastro.estoque.actionsList', ['id' => $item->id, 'option' => 'remove']) }}"
                                                onclick="return confirm('Deseja realmente remover esse item ?')"><button
                                                    id="btnUpdate" class="btn btn-danger btn-md center-block"
                                                    name="btnAction" value="btnRemove"><img
                                                        src="{{ asset('img/icons/removeIcon.png') }}" class="imgIcons"
                                                        value="{{ $item->id }}" /> Remover</button></a>
                                        @endif
                                    @endif
                                </div>
                            </div> <!-- End buttons edit /  remove-->
                        </td>
                    </tr>
                @endforeach
            @else
                <div class="alert alert-danger" role="alert">
                    Nenhum item encontrado !
                </div>
            @endif
        </tbody>
    </table>


    <!-- JS from page -->
    <script type="text/javascript">
        // Hidden or show div of query
        function hiddenOrShowQuerUser() {
            switch (document.getElementById("containerQuery").className) {
                case "hiddenDiv":
                    document.getElementById("containerQuery").classList.remove("hiddenDiv");
                    document.getElementById("containerQuery").classList.add("showDiv");
                    break;
                case "showDiv":
                    document.getElementById("containerQuery").classList.remove("showDiv");
                    document.getElementById("containerQuery").classList.add("hiddenDiv");
                    break;
                default:
                    //Do something
                    break;
            }
        }

        function sendInfoToModal(option){
          document.getElementById("txtCodigoToSend").value = document.getElementById("txtCodigoToOtherModel").value;
          document.getElementById("txtOptionToSend").value = option;
          document.getElementById("btnActionToSend").value = option;
        }
    </script>
@endsection
