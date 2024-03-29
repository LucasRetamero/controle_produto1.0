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
        <h1 class="h2">Consultar / Produto</h1>
        <hr style="border-top:3px solid #000">
    </div>

    <!-- buttons actions -->
    <div id="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="h3">Menu</h1>
                @if (Auth::User()->nivel_acesso == 'administrador' || Auth::User()->nivel_acesso == 'gerencia')
                  @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                  <a href="" data-toggle="modal" data-target="#businessListToSend"><button id="btnAddProduct"
                            class="btn btn-success font-weight-bold text-white"><img
                                src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons" /> Adicionar novo</button></a>
                  @else
                  <a href="{{ route('dashboard.cadastro.produto.productAddForm') }}"><button id="btnAddProduct"
                            class="btn btn-success font-weight-bold text-white"><img
                                src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons" /> Adicionar novo</button></a>
                  @endif
                @endif
                <button id="btnQueryUser" class="btn btn-primary font-weight-bold text-white"
                    onClick="hiddenOrShowQuerUser()"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons" />
                    Consultar</button>
            </div>
        </div>
    </div>

    </br>
    <!-- Filter user List -->
    <div id="containerQuery" class="hiddenDiv">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="h3">Consultar lista de produto</h1>
                @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                    <form method="post" action="{{ route('dashboard.produtos.filter.adm') }}">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                        <div class="form-row">

                            <div class="col2">
                                <div class="form-group">
                                    <select class="form-control" id="slctQuery" name="cbQuery">
                                        <option value="nome" selected>Nome</option>
                                        <option value="codigo">Codigo</option>
                                        <option value="ean">EAN</option>
                                        <option value="fornecedor">Fornecedor</option>
                                        <option value="subEspecie">Sub-Especie</option>
                                        <option value="referencia">Referencia</option>
                                        <option value="classicacao">Classicaçâo</option>
                                        <option value="etica">Etica</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div id="searchInput" class="form-group">
                                    <input type="text" id="nameSearch" name="textSearch" class="form-control"
                                        placeholder="Digite para pesquisar sobre o produto...">
                                </div>
                            </div>

                        </div>
                        <h1 class="h4">Lista de empresa</h1>
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <select class="form-control" id="cb_empresaId" name="empresa_id">
                                    <option value="000" selected disabled>Seleciona a Empresa...</option>
                                    @foreach ($dadosEmpresa as $item)
                                        @if (isset($dadosEmpresa) && isset($itemSelected) && $itemSelected == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->razao_social }}</option>
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
                    <form method="post" action="{{ route('dashboard.cadastro.produto.searching') }}">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                        <div class="form-row">

                            <div class="col2">
                                <div class="form-group">
                                    <select class="form-control" id="slctQuery" name="cbQuery">
                                        <option value="nome" selected>Nome</option>
                                        <option value="codigo">Codigo</option>
                                        <option value="ean">EAN</option>
                                        <option value="fornecedor">Fornecedor</option>
                                        <option value="subEspecie">Sub-Especie</option>
                                        <option value="referencia">Referencia</option>
                                        <option value="classicacao">Classicaçâo</option>
                                        <option value="etica">Etica</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div id="searchInput" class="form-group">
                                    <input type="text" id="nameSearch" name="textSearch" class="form-control"
                                        placeholder="Digite para pesquisar sobre o produto...">
                                </div>
                            </div>

                        </div>

                        <button type="submit" name="btnAction" value="nameQuery"
                            class="btn btn-primary font-weight-bold"><img src="{{ asset('img/icons/FilterIcon.png') }}"
                                class="imgIcons" /> Iniciar consulta</button>
                        <A href="{{ route('dashboard.cadastro.produto') }}"><button
                                class="btn btn-success font-weight-bold"><img
                                    src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons" /> Buscar
                                Todos</button></a>

                    </form>
                @endif
            </div>
        </div>
    </div>

    @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id) && isset($dadosEmpresa))
        <div class="modal fade" id="businessListToSend" tabindex="-1" role="dialog"
            aria-labelledby="businessListToSendlLabel" aria-hidden="true">
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


    </br>
    <!-- Table of users -->
    <table class="table">
        <h1 class="h3 text-center">Lista de Produtos</h1>
        <thead class="thead">
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nome</th>
                <th scope="col">EAN</th>
                <th scope="col">Fornecedor</th>
                <th scope="col">Sub-Especie</th>
                <th scope="col">Referencia</th>
                <th scope="col">Classificação</th>
                <th scope="col">Etica</th>
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
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->ean }}</td>
                        <td>{{ $item->fornecedor }}</td>
                        <td>{{ $item->sub_especie }}</td>
                        <td>{{ $item->referencia }}</td>
                        <td>{{ $item->classificacao }}</td>
                        <td>{{ $item->etica }}</td>
                        <td>
                            <div class="row">
                                <!-- buttons edit /  remove-->
                                <div class="col-sm-12 text-center">
                                    @if (Auth::User()->nivel_acesso == 'administrador' || Auth::User()->nivel_acesso == 'gerencia')
                                        @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                                            <a
                                                href="{{ route('dashboard.cadastro.produto.productAddForm.adm.edit', [$item->id, $item->empresa_id]) }}"><button
                                                    id="btnUpdate" class="btn btn-warning btn-md center-block"
                                                    name="btnAction" value="btnEdit"><img
                                                        src="{{ asset('img/icons/editIcon.png') }}" class="imgIcons" />
                                                    Editar</button></a>
                                            <a href="{{ route('dashboard.cadastro.produto.productAddForm.remove', $item->id) }}"
                                                onclick="return confirm('Deseja realmente remover esse item ?')"><button
                                                    id="btnUpdate" class="btn btn-danger btn-md center-block"
                                                    name="btnAction" value="btnRemove"><img
                                                        src="{{ asset('img/icons/removeIcon.png') }}" class="imgIcons"
                                                        value="{{ $item->id }}" /> Remover</button></a>
                                        @else
                                            <a
                                                href="{{ route('dashboard.cadastro.produto.productAddForm.edit', $item->id) }}"><button
                                                    id="btnUpdate" class="btn btn-warning btn-md center-block"
                                                    name="btnAction" value="btnEdit"><img
                                                        src="{{ asset('img/icons/editIcon.png') }}" class="imgIcons" />
                                                    Editar</button></a>
                                            <a href="{{ route('dashboard.cadastro.produto.productAddForm.remove', $item->id) }}"
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
        // List of text component -------
        var txtComponentList = ["idNomeSearch",
            "idSobreNomeSearch",
            "idEmailSearch",
            "idLoginSearch"
        ];

        // Options of the Select list ------
        var nivelAcessoOptions = ["Administração",
            "Gerência",
            "Produção"
        ];

        // Select configuration -----------
        var nivelAcessoSelectList = document.createElement('select');
        nivelAcessoSelectList.id = "nivelAcessoSearch";;
        nivelAcessoSelectList.name = "nivelAcessoQuery";
        nivelAcessoSelectList.className = "form-control";

        // Text form configuration-------
        var formTextMethod = document.createElement("INPUT");
        formTextMethod.setAttribute("type", "text");
        formTextMethod.className = "form-control";

        // Get select component-------
        var select = document.getElementById('slctQuery');

        // Execute when select an option from search
        select.addEventListener('change', function() {
            verifyTheCase();
        });

        // Verify the option selected to create element
        function verifyTheCase() {
            switch (select.value) {
                case "Nome":
                    createFormTextMethod("idNomeSearch", "nomeSearch", "Digite o nome do usuario..");
                    break;
                case "Sobrenome":
                    createFormTextMethod("idSobreNomeSearch", "sobreNomeSearch", "Digite o sobrenome do usuario..");
                    break;
                case "Email":
                    createFormTextMethod("idEmailSearch", "emailSearch", "Digite o email do usuario..");
                    break;
                case "Login":
                    createFormTextMethod("idLoginSearch", "loginSearch", "Digite o login do usuario..");
                    break;
                case "Nivel de acesso":
                    createSelectMethod();
                    break;
            }
        }

        // Set configuration to create element
        function createFormTextMethod(idInput, nameInput, placeHolInput) {
            formTextMethod.id = idInput;
            formTextMethod.name = nameInput;
            formTextMethod.placeholder = placeHolInput;

            if (document.getElementById("nameSearchOrigin")) {
                document.body.querySelector("#searchInput").removeChild(document.getElementById("nameSearchOrigin"));
                verifyTheCase();
            } else if (document.getElementById("nivelAcessoSearch")) {
                document.body.querySelector("#searchInput").removeChild(document.getElementById("nivelAcessoSearch"));
                verifyTheCase();
            } else {
                document.body.querySelector("#searchInput").appendChild(formTextMethod);
            }
        }

        //Clear other elements before create list
        function clearOtherElement() {
            if (document.getElementById("nameSearchOrigin")) {
                document.body.querySelector("#searchInput").removeChild(document.getElementById("nameSearchOrigin"));
            } else {
                for (var x = 0; x < txtComponentList.length; x++) {
                    if (document.getElementById(txtComponentList[x]))
                        document.body.querySelector("#searchInput").removeChild(document.getElementById(txtComponentList[
                            x]));
                }
            }
        }

        // Add option and configuration of the select
        function createSelectMethod() {

            clearOtherElement();

            if (nivelAcessoSelectList.length > 0) {
                clearListBeforeAdd();
                addOptionListSearch();
            } else {
                addOptionListSearch();
            }

            document.body.querySelector("#searchInput").appendChild(nivelAcessoSelectList);
        }

        //Add option on the list
        function addOptionListSearch() {
            for (var o = 0; o < nivelAcessoOptions.length; o++) {
                var option = document.createElement("option");
                option.value = nivelAcessoOptions[o];
                option.text = nivelAcessoOptions[o];
                nivelAcessoSelectList.appendChild(option);
            }
        }

        //Clear List
        function clearListBeforeAdd() {
            for (var p = nivelAcessoSelectList.length - 1; p >= 0; p--) {
                nivelAcessoSelectList.options[p] = null;
            }
        }

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
    </script>
@endsection
