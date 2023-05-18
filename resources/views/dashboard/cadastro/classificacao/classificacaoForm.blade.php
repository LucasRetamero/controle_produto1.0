@extends('dashboard.default')

@section('title', 'Fazendo Logistica - Dashboard')

@section('content')
    <!-- CSS -->
    <style type="text/css">
        .imgIcons {
            width: 30px;
            height: 30px;
        }

        #fixedButtom {
            position: fixed;
            bottom: 0;
            top: 0;
        }

        .roundedFixedBtn {
            height: 60px;
            line-height: 80px;
            width: 60px;
            font-size: 2em;
            font-weight: bold;
            border-radius: 50%;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            cursor: pointer;
        }


        thead {
            background-color: #FFF;
            color: #000;
            font-size: large;
        }

        th,
        td {
            font-size: large;
        }

        td {
            background-color: #FFF;
            color: #000;
        }

        button {
            margin-bottom: 15px;
        }

        .invalid-feedback {
            font-weight: bold;
            color: #FFF;
            font-size: 15px;
        }
    </style>

    <div class="container" id="topPage">
        <h1 class="h2">Cadastro / <a href="{{ route('dashboard.cadastro.classificacao') }}">Classificação</a> /
            Formulário: Classificação</h1>
        <hr style="border-top:3px solid #000">
    </div>

    <!-- Return message from query -->
    @if (isset($msgSuccess))
        <div class="alert alert-success h5" role="alert">
            {{ $msgSuccess }}
        </div>
    @endif


    <div class="jumbotron bg-primary">

        <div class="container">
            <h1 class="h3 text-white">Formulário: Classificação</h1>
            <hr style="border-top:3px solid #FFF">
        </div>

        <form method="post" action="{{ route('dashboard.cadastro.classificacao.editarFormulario') }}"
            class="form-signin needs-validation" novalidate>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

            <!-- ID -->
            @if (isset($dadosClassificacao) && !empty(Auth::User()->empresa_id))
                <input type="hidden" id="id_codigo" name="id" value="{{ $dadosClassificacao[0]->id }}">
                <input type="hidden" id="empresa_id" name="empresa_id" value="{{ $dadosClassificacao[0]->empresa_id }}">
            @else
                @if (isset($dadosClassificacao))
                    <input type="hidden" id="id_codigo" name="id" value="{{ $dadosClassificacao[0]->id }}">
                @endif
            @endif

            <div class="form-group row">
                <label for="txtClassificacao" class="col-sm-2 text-white h4">Classificação:</label>
                <div class="col-sm-9">
                    @if (isset($dadosClassificacao))
                        <input type="text" class="form-control" id="txtClassificacao" name="nome"
                            value="{{ $dadosClassificacao[0]->nome }}" placeholder="Digite a classificação..." required
                            autofocus>
                    @else
                        <input type="text" class="form-control" id="txtClassificacao" name="nome"
                            placeholder="Digite a classificação..." required autofocus>
                    @endif
                    <div class="invalid-feedback">
                        Campo Classificação vazio !
                    </div>
                </div>
            </div>

            <!-- Empresa -->
            @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                <div class="form-group row">
                    <label for="cb_empresa_id" class="col-sm-2 text-white h4">Empresa:</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="cb_empresa_id" name="empresa_id" required>
                            <option value="" selected disabled>Seleciona a Empresa...</option>
                            @foreach ($dadosEmpresa as $item)
                                @if (isset($dadosEmpresa) && isset($empresaSelected) && $empresaSelected == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->razao_social }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->razao_social }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Necessário selecionar uma Empresa
                        </div>
                    </div>
                </div>
            @endif
            </br>
            <!-- Actions buttons -->
            @if (!isset($dadosClassificacao))
                <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;"
                    value="btnAdd"><img src="{{ asset('img\icons\addIcon.png') }}"></img>Cadastrar</button>
            @else
                <button type="submit" name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;"
                    value="btnEdit"><img src="{{ asset('img\icons\editIcon.png') }}" width="40px"
                        height="40px"></img>Editar</button>
                <button type="submit" name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;"
                    value="btnRemove"><img src="{{ asset('img\icons\removeIcon.png') }}" width="40px"
                        height="40px"></img>Remover</button>
            @endif
            <a href="{{ route('dashboard.cadastro.classificacao') }}"><button type="button"
                    class="btn btn-light btn-block" style="font-size:x-large;"><img
                        src="{{ asset('img\icons\NoIcon.png') }}" width="40px" height="40px"></img>Cancelar</button></a>


        </form>
    </div>


    </div>
    </div>

    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
    </div>

    <!-- JS Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endsection
