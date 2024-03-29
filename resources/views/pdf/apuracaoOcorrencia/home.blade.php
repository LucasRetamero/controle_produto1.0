@extends('dashboard.default')

@section('title', 'Fazendo Logistica - Dashboard / Relatório: Apuracao de Ocorrencia')

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
    </style>

    <div class="container" id="topPage">
        <h1 class="h2">Relatório / Apuração de Ocorrencia / Formulário: Apuração de Ocorrencia</h1>
        <hr style="border-top:3px solid #000">
    </div>
    <!-- Return message from query -->
    @if (isset($msgError))
        <div class="alert alert-danger h5" role="alert">
            {{ $msgError }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <p class="h5"><strong>Houve um erro no processo:</strong></p>
            <ul class="h5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="jumbotron bg-primary">

        <div class="container">
            <h1 class="h3 text-white">Relatório: Apuração de Ocorrência</h1>
            <hr style="border-top:3px solid #FFF">
        </div>

        <div id="containerQuery" class="hiddenDiv">
            <div class="col-sm-12">
                <form method="post" action="{{ route('dashboard.pdf.apuracao_ocorrencia.actionsMenu') }}" target="_blank">

                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    @if (empty(Auth::User()->empresa_id))
                        <input type="hidden" name="empresa_id" id="empresa_id" value="{{ $empresa_id }}" />
                    @endif

                    <div class="form">

                        <div class="col2">
                            <label class="col text-white h4">Digite o codigo do produto:</label>
                            <div id="searchInput" class="form-group">
                                <input type="text" id="nameSearch" name="consulta" class="form-control"
                                    placeholder="Digite o codigo do produto...">
                            </div>
                        </div>

                        <div class="col2">
                            <label class="col text-white h4">Digite o estoquista:</label>
                            <div id="searchInput" class="form-group">
                                <input type="text" id="nameSearch" name="estoquista" class="form-control"
                                    placeholder="Digite o estoquista...">
                            </div>
                        </div>

                        <div class="col2">
                            <label class="col text-white h4">Digite o validador:</label>
                            <div id="searchInput" class="form-group">
                                <input type="text" id="nameSearch" name="validador" class="form-control"
                                    placeholder="Digite o validador...">
                            </div>
                        </div>

                        <div class="col2">
                            <div class="form-group">
                                <label class="col text-white h4">Digite as Observações e Detalhes</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="observacao_detalhes"
                                    placeholder="Digite as Observações e Detalhes..."></textarea>
                            </div>
                        </div>

                    </div>

                    <button type="submit" name="btnAction" value="nameQuery" class="btn btn-success btn-block"
                        style="font-size:x-large;"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons" />
                        Gerar Relatório</button>
                    <a href="{{ route('dashboard.cadastro.estoque') }}" target="_blank" class="btn btn-light btn-block"
                        style="font-size:x-large;"><img src="{{ asset('img\icons\leftArrowIcon.png') }}" width="40px"
                            height="40px"></img>Lista de Inventário</a>

                </form>
            </div>
        </div>


    </div>




    <!-- JS Script -->
    <script type="text/javascript">
        //var $input    = document.getElementById('inputFileForm'),
        //     $fileName = document.getElementById('fileName');

        //$input.addEventListener('change', function(){
        //	$fileName.textContent = document.getElementById('srcFileText').value = this.value;
        //	document.getElementById('imgProduto').value = $fileName.textContent;
        //});
        function updateDiv(div) {
            var div = '#' + div;
            $(div).load(window.location.href + " " + div);
        }
    </script>
@endsection
