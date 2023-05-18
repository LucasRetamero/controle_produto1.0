@extends('dashboard.default')

@section('title','Fazendo Logistica - Dashboard')

@section('content')
<!-- CSS -->
<style type="text/css">
.imgIcons{
 width: 30px;
 height: 30px;
}
#fixedButtom {
 position: fixed;
 bottom: 0;
 top: 0;
}

.roundedFixedBtn{
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


thead{
	background-color: #FFF;
	color: #000;
	font-size: large;
}
th,td{
 font-size:large;
}

td{
  background-color: #FFF;
  color: #000;
}

.invalid-feedback {
    font-weight: bold;
    color: #FFF;
    font-size: 15px;
}

</style>

<div class="container" id="topPage">
            <h1 class="h2">Cadastro / <a href="{{ route('dashboard.cadastro.produto') }}">Produto</a> / Formulário: Produto</h1>
            <hr style="border-top:3px solid #000">
</div>
<!-- Return message from query -->
 @if(isset($msgSuccess))
 <div class="alert alert-success h5" role="alert">
 {{ $msgSuccess }}
 </div>
 @endif

 <div class="jumbotron bg-primary">

		<div class="container">
          <h1 class="h3 text-white">Formulário: Produto</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>

   <form class="form-signin needs-validation" method="post" action="{{ route('dashboard.cadastro.produto.productAddForm.action') }}" novalidate>

		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


		<!-- Code -->
        @if(isset($dadosProduto))
 	     <input  type="hidden"  id="id_codigo" name="id" value="{{ $dadosProduto[0]->id }}" />
		@endif

	   <!-- Codigo -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h5">Codigo:</label>
        <div class="col-sm-9">
		 @if(isset($dadosProduto))
		  <input type="text" class="form-control" id="txtCodigo" name="codigo" value="{{ $dadosProduto[0]->codigo }}" placeholder="Digite o Codigo do produto..." required autofocus>
          @else
		  <input type="text" class="form-control" id="txtCodigo" name="codigo" placeholder="Digite o Codigo do produto..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo Codigo vazio !
        </div>
        </div>
       </div>

	   <!-- Nome -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h5">Nome:</label>
        <div class="col-sm-9">
		 @if(isset($dadosProduto))
		  <input type="text" class="form-control" id="txtNome" name="nome" value="{{ $dadosProduto[0]->nome }}" placeholder="Digite o nome do produto..." required autofocus>
          @else
		  <input type="text" class="form-control" id="txtNome" name="nome" placeholder="Digite o nome do produto..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo Nome vazio !
        </div>
        </div>
       </div>

	   <!-- EAN -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h5">EAN:</label>
        <div class="col-sm-9">
		 @if(isset($dadosProduto))
		  <input type="text" class="form-control" id="txtEAN" name="ean" value="{{ $dadosProduto[0]->ean }}" placeholder="Digite o codigo de barras do produto..." required autofocus>
          @else
		  <input type="text" class="form-control" id="txtEAN" name="ean" placeholder="Digite o codigo de barras do produto..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo EAN vazio !
        </div>
        </div>
       </div>

	   <!-- Fornecedor -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h5">Fornecedor:</label>
        <div class="col-sm-9">
		 @if(isset($dadosProduto))
		   <input type="text" class="form-control" id="txtFornecedor" name="fornecedor" value="{{ $dadosProduto[0]->fornecedor }}" placeholder="Digite o fornecedor do produto..." required autofocus>
          @else
		   <input type="text" class="form-control" id="txtFornecedor" name="fornecedor" placeholder="Digite o fornecedor do produto..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo Fornecedor vazio !
        </div>
        </div>
       </div>

	   <!-- Sub-Especie -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h5">Sub-Especie:</label>
        <div class="col-sm-9">
		 <select class="form-control" id="cb_localizacao" name="sub_especie" required>
         <option  value="" selected>Seleciona a Sub-Especie do produto...</option>
	      @foreach($dadosSubEspecie as $item)
   	        @if(isset($dadosProduto) &&  $dadosProduto[0]->sub_especie == $item->sub_especie)
     	      <option value="{{ $item->sub_especie }}" selected>{{ $item->sub_especie }}</option>
		      @else
		      <option value="{{ $item->sub_especie }}">{{ $item->sub_especie }}</option>
              @endif
		     @endforeach
		 </select>
         <div class="invalid-feedback">
            Necessário selecionar uma Sub-Especie
        </div>
        </div>
       </div>

       <div class="form-group row">
        <label for="txtReferencia" class="col-sm-2 text-white h5">Referencia:</label>
        <div class="col-sm-9">
		 @if(isset($dadosProduto))
		   <input type="text" class="form-control" id="txtReferencia" name="referencia" value="{{ $dadosProduto[0]->fornecedor }}" placeholder="Digite a referencia(codigo do fornecedor)..." required autofocus>
          @else
		   <input type="text" class="form-control" id="txtReferencia" name="referencia" placeholder="Digite a referencia(codigo do fornecedor)..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo Referencia vazio !
        </div>
        </div>
       </div>

       <div class="form-group row">
        <label for="txtClassificacao" class="col-sm-2 text-white h5">Classificacao:</label>
        <div class="col-sm-9">
		 <select class="form-control" id="txtClassificacao" name="classificacao" required>
          <option  value="" selected disabled>Seleciona a Classificacao do produto</option>
	      @foreach($dadosClassificacao as $item)
   	        @if(isset($dadosProduto) &&  $dadosProduto[0]->classificacao == $item->nome)
     	      <option value="{{ $item->nome }}" selected>{{ $item->nome }}</option>
		      @else
		      <option value="{{ $item->nome }}">{{ $item->nome }}</option>
              @endif
		     @endforeach
		 </select>
         <div class="invalid-feedback">
            Necessário selecionar uma Classificacao !
        </div>
        </div>
       </div>

       <div class="form-group row">
        <label for="txtEtica" class="col-sm-2 text-white h5">Etica:</label>
        <div class="col-sm-9">
		 @if(isset($dadosProduto))
		   <input type="text" class="form-control" id="txtEtica" name="etica" value="{{ $dadosProduto[0]->fornecedor }}" placeholder="Digite a referencia(codigo do fornecedor)..." required autofocus>
          @else
		   <input type="text" class="form-control" id="txtEtica" name="etica" placeholder="Digite a referencia(codigo do fornecedor)..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo Etica vazio !
        </div>
        </div>
       </div>

    <!-- Empresa -->
    @if(Auth::User()->nivel_acesso == "administrador" && empty(Auth::User()->empresa_id))
       <div class="form-group row">
        <label for="cb_empresa_id" class="col-sm-2 text-white h5">Empresa:</label>
        <div class="col-sm-9">
		 <select class="form-control" id="cb_empresa_id" name="empresa_id" required>
         <option  value="" selected disabled>Seleciona a Empresa...</option>
	      @foreach($dadosEmpresa as $item)
   	         @if(isset($dadosEmpresa) &&  isset($empresaSelected) && $empresaSelected == $item->id)
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

  </br>
  <!-- Actions buttons -->
  @if(!isset($dadosProduto))
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="{{ asset('img\icons\addIcon.png') }}"></img>Cadastrar</button>
 @else
 </br><button type="submit" name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="{{ asset('img\icons\editIcon.png') }}" width="40px" height="40px"></img>Editar</button>
 </br><button type="submit" name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="{{ asset('img\icons\removeIcon.png') }}" width="40px" height="40px"></img>Remover</button>
 @endif
 </br><a href="{{ route('dashboard.cadastro.produto') }}" class="btn btn-light btn-block" style="font-size:x-large;"><img src="{{ asset('img\icons\leftArrowIcon.png') }}" width="40px" height="40px"></img>Lista de Produtos</a>

 </form>
</div>




<!-- JS Script -->
<script type="text/javascript">
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
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

