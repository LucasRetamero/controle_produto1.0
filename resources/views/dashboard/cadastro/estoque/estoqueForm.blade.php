@extends('dashboard.default')

@section('title','Fazendo Logistica - Dashboard')

@section('content')
<style type="text/css">
.invalid-feedback {
    font-weight: bold;
    color: #FFF;
    font-size: 15px;
}
</style>

<div class="container">
            <h1 class="h2">Cadastro / <a href="{{ route('dashboard.cadastro.estoque') }}">Logistico</a> / Formulário: Logistico</h1>
            <hr style="border-top:3px solid #000">
</div>

<!-- Return message from query -->
 @if(isset($msgSuccess))
 <div class="alert alert-success h5" role="alert">
 {{ $msgSuccess }}
 </div>
 @endif

 <!-- Return message from query -->
 @if(isset($msgError))
 <div class="alert alert-danger h5" role="alert">
 {{ $msgError }}
 </div>
 @endif

 @if($errors->any())
    <div class="alert alert-danger">
        <p class="h5"><strong>Preencha todos os campos:</strong></p>
        <ul class="h5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<!-- Estoque form -->
<div class="jumbotron bg-primary">

	  <form method="get" action="{{ route('dashboard.cadastro.estoque.estoqueAddForm.getProduto') }}">
       <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

	 <div class="form">

      <div class="col">
	  <label for="staticEmail" class="text-white h5">Pesquisar pelo codigo do produto</label>

	    <div id="searchInput" class="form-group">
         <input type="text" id="nameSearchOrigin" name="nomeProdutoQuery" class="form-control" placeholder="Pesquisar pelo codigo do produto..." required autofocus>
        </div>
	 </div>

     </div>

	 <div class="row mx-auto">
	   <button type="submit" name="btnAction" value="nameQuery" class="btn btn-primary font-weight-bold"><img src="{{ asset('img/icons/FilterIcon.png') }}" width="40px" height="40px" class="imgIcons"/> Iniciar consulta</button>
	   <a href="{{ route('dashboard.cadastro.produto') }}" target="_blank" class="btn btn-success font-weight-bold"><img src="{{ asset('img/icons/estoqueIcons.png') }}" width="40px" height="40px" class="imgIcons"/> Lista de produtos</a>
     </div>
	</form>
	</br>
		<div class="container">
          <h1 class="h3 text-white">Formulário: Logistico</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>

		<form method="post" action="{{ route('dashboard.cadastro.estoque.estoqueAddForm.actionsList') }}" class="form-signin needs-validation" novalidate>

   <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

    <!-- ID -->
	@if(isset($dadosLogistico))
	   <input type="hidden" id="id_codigo"  name="id" value="{{ $dadosLogistico[0]->id }}">
	   <input type="hidden" id="empresa_id"  name="empresa_id" value="{{ $dadosLogistico[0]->empresa_id }}">
	@endif

	  <!-- Codigo -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Codigo:</label>
        <div class="col-sm-9">
		 @if(isset($dadosLogistico) || isset($dadosProduto) )
		   @if(isset($dadosLogistico))
	       <input type="text" class="form-control bg-warning" id="txtCodigo" name="codigo" value="{{ $dadosLogistico[0]->codigo }}" placeholder="Digite o endereço..." required autofocus>
		   @else
		   <input type="text" class="form-control bg-warning" id="txtCodigo" name="codigo" value="{{ $dadosProduto[0]->codigo }}" placeholder="Digite o endereço..." required autofocus>
           @endif
		  @else
		  <input type="text" class="form-control bg-warning" id="txtCodigo" name="codigo" placeholder="Digite o endereço..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo Codigo vazio !
        </div>
        </div>
       </div>

	   <!-- Nome do produto -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Nome:</label>
        <div class="col-sm-9">
		 @if(isset($dadosLogistico) || isset($dadosProduto) )
		   @if(isset($dadosLogistico))
	       <input type="text" class="form-control bg-warning" id="txtNomeProduto" name="nome_produto" value="{{ $dadosLogistico[0]->nome_produto }}" placeholder="Digite o nome do produto..." required autofocus>
	       @else
		   <input type="text" class="form-control bg-warning" id="txtNomeProduto" name="nome_produto" value="{{ $dadosProduto[0]->nome }}" placeholder="Digite o nome do produto..." required autofocus>
           @endif
		  @else
		  <input type="text" class="form-control bg-warning" id="txtNomeProduto" name="nome_produto" placeholder="Digite o nome do produto..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo Nome vazio !
        </div>
        </div>
       </div>

	   <!-- EAN -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">EAN:</label>
        <div class="col-sm-9">
		 @if(isset($dadosLogistico) || isset($dadosProduto) )
		  @if(isset($dadosLogistico))
	      <input type="text" class="form-control bg-warning" id="txtNomeProduto" name="ean" value="{{ $dadosLogistico[0]->ean  }}" placeholder="Digite o codigo de barras do produto..." required autofocus>
	      @else
		  <input type="text" class="form-control bg-warning" id="txtNomeProduto" name="ean" value="{{ $dadosProduto[0]->ean  }}" placeholder="Digite o codigo de barras do produto..." required autofocus>
          @endif
		 @else
		  <input type="text" class="form-control bg-warning" id="txtNomeProduto" name="ean" placeholder="Digite o codigo de barras do produto..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo EAN vazio !
        </div>
        </div>
       </div>

	   <!-- Fornecedor -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Fornecedor:</label>
        <div class="col-sm-9">
		 @if(isset($dadosLogistico) || isset($dadosProduto))
		   @if(isset($dadosLogistico))
	       <input type="text" class="form-control bg-warning" id="txtFornecedor" name="fornecedor" value="{{ $dadosLogistico[0]->fornecedor  }}" placeholder="Digite o fornecedor do produto..." required autofocus>
		   @else
		   <input type="text" class="form-control bg-warning" id="txtFornecedor" name="fornecedor" value="{{ $dadosProduto[0]->fornecedor  }}" placeholder="Digite o fornecedor do produto..." required autofocus>
           @endif
		  @else
		  <input type="text" class="form-control bg-warning" id="txtFornecedor" name="fornecedor" placeholder="Digite o fornecedor do produto..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo Fornecedor vazio !
        </div>
        </div>
       </div>

	   <!-- Sub-Especie -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Sub-Especie:</label>
        <div class="col-sm-9">
		 <select class="form-control bg-warning" id="cb_localizacao" name="sub_especie" required autofocus>
          <option  value="" selected>Seleciona a Sub-Especie do produto....</option>
	      @foreach($dadosSubEspecie as $item)
   	        @if(isset($dadosLogistico) &&  $dadosLogistico[0]->sub_especie == $item->sub_especie || isset($dadosProduto) &&  $dadosProduto[0]->sub_especie == $item->sub_especie)
     	      <option value="{{ $item->sub_especie }}" selected>{{ $item->sub_especie }}</option>
		      @else
		      <option value="{{ $item->sub_especie }}">{{ $item->sub_especie }}</option>
              @endif
		     @endforeach
		 </select>
         <div class="invalid-feedback">
            Necessário selecionar uma Sub-Especie !
        </div>
        </div>
       </div>

       <!-- Referencia -->
       <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Referencia:</label>
        <div class="col-sm-9">
		 @if(isset($dadosLogistico) || isset($dadosProduto))
		   @if(isset($dadosLogistico))
	       <input type="text" class="form-control bg-warning" id="txtReferencia" name="referencia" value="{{ $dadosLogistico[0]->referencia  }}" placeholder="Digite o referencia do produto..." required autofocus>
		   @else
		   <input type="text" class="form-control bg-warning" id="txtReferencia" name="referencia" value="{{ $dadosProduto[0]->referencia  }}" placeholder="Digite o referencia do produto..." required autofocus>
           @endif
		  @else
		  <input type="text" class="form-control bg-warning" id="txtReferencia" name="referencia" placeholder="Digite o referencia do produto..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo Referencia vazio !
        </div>
        </div>
       </div>

       <!-- Classificacao -->
       <div class="form-group row">
        <label for="cb_classificacao" class="col-sm-2 text-white h4">Classificacao:</label>
        <div class="col-sm-9">
		 <select class="form-control bg-warning" id="cb_classificacao" name="classificacao" required autofocus>
          <option  value="" selected>Seleciona a Classificacao do produto....</option>
	      @foreach($dadosClassificacao as $item)
   	        @if(isset($dadosLogistico) &&  $dadosLogistico[0]->classificacao == $item->nome || isset($dadosProduto) &&  $dadosProduto[0]->classificacao == $item->nome)
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

       <!-- Etica -->
       <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Etica:</label>
        <div class="col-sm-9">
		 @if(isset($dadosLogistico) || isset($dadosProduto))
		   @if(isset($dadosLogistico))
	       <input type="text" class="form-control bg-warning" id="txtEtica" name="etica" value="{{ $dadosLogistico[0]->etica  }}" placeholder="Digite o etica do produto..." required autofocus>
		   @else
		   <input type="text" class="form-control bg-warning" id="txtEtica" name="etica" value="{{ $dadosProduto[0]->etica  }}" placeholder="Digite o etica do produto..." required autofocus>
           @endif
		  @else
		  <input type="text" class="form-control bg-warning" id="txtEtica" name="etica" placeholder="Digite o etica do produto..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo Etica vazio !
        </div>
        </div>
       </div>



	   <!-- Lote -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Lote:</label>
        <div class="col-sm-9">
		 @if(isset($dadosLogistico))
		  <input type="text" class="form-control" id="txtLote" name="lote" value="{{ $dadosLogistico[0]->lote }}" placeholder="Digite o lote..." required autofocus>
          @else
		  <input type="text" class="form-control" id="txtLote" name="lote" placeholder="Digite o lote..." required autofocus>
         @endif
         <div class="invalid-feedback">
            Campo Lote vazio !
        </div>
        </div>
       </div>

	   <!-- Endereço -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Endereço:</label>
        <div class="col-sm-9">
		 <select class="form-control" id="cb_localizacao" name="endereco" required autofocus>
          <option  value="" selected>Seleciona o Endereço do produto....</option>
	      @foreach($dadosEndereco as $item)
   	        @if(isset($dadosLogistico) &&  $dadosLogistico[0]->endereco == $item['endereco'])
                @if($item['id'] == 000)
                <option value="{{ $item['id'] }}" disabled>{{ $item['endereco'] }}</option>
                @else
                <option value="{{ $item['endereco'] }}" selected>{{ $item['endereco'] }}</option>
                @endif
		      @else
                @if($item['id'] == 000)
                <option value="{{ $item['id'] }}" disabled>{{ $item['endereco'] }}</option>
                @else
                <option value="{{ $item['endereco'] }}">{{ $item['endereco'] }}</option>
                @endif
              @endif
		     @endforeach
		 </select>
         <div class="invalid-feedback">
            Necessário selecionar um Endereço !
        </div>
        </div>
       </div>

	   <!-- Tipo do endereço -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Tipo Endereço:</label>
        <div class="col-sm-9">
		 <select class="form-control" id="cb_localizacao" name="tipo_endereco" required autofocus>
          <option  value="" selected>Seleciona o Tipo Endereço....</option>
	      @foreach($dadosTipoEndereco as $item)
   	        @if(isset($dadosLogistico) &&  $dadosLogistico[0]->tipo_endereco == $item->tipo_endereco )
     	      <option value="{{ $item->tipo_endereco }}" selected>{{ $item->tipo_endereco }}</option>
		      @else
		      <option value="{{ $item->tipo_endereco }}">{{ $item->tipo_endereco }}</option>
              @endif
		     @endforeach
		 </select>
         <div class="invalid-feedback">
            Necessário selecionar o do Tipo Endereço !
        </div>
        </div>
       </div>
  </br>
  <!-- Actions buttons -->
  @if(!isset($dadosLogistico))
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="{{ asset('img\icons\addIcon.png') }}"></img>Cadastrar</button>
 @else
 </br><button type="submit" name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="{{ asset('img\icons\editIcon.png') }}" width="40px" height="40px"></img>Editar</button>
 </br><button type="submit" name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="{{ asset('img\icons\removeIcon.png') }}" width="40px" height="40px"></img>Remover</button>
 @endif
 </br><a href="{{ route('dashboard.cadastro.estoque') }}" class="btn btn-light btn-block" style="font-size:x-large;"><img src="{{ asset('img\icons\leftArrowIcon.png') }}" width="40px" height="40px"></img>Lista Logistico</a>

 </form>

  </div><!-- Termina estoque -->
  </br>


 </form>
</div><!-- Termina lista do estoque -->

<script>
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

