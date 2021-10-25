@extends('dashboard.default')

@section('title','Controle de produto - Dashboard / Formulário: Produto')

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

   <form class="form-signin" method="post" action="{{ route('dashboard.cadastro.produto.productAddForm.action') }}" onsubmit="return confirm('Deseja realmente executar essa açâo ?');">
    
		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
		
		<!-- Photo 
	    <div class="form-group mx-auto" style="width: 200px;">
         <label for="txtLogin" class="h5">Imagem do produto</label>
	     <img src="{{ asset('img/icons/defaultProductIcon.png')}}" width="200px" height="200px" id="imgProdutoShow"/>
         <small id="txtEmail" class="form-text text-muted"> Small text</small>
	     <label for="inputFileForm" class="btn btn-primary font-weight-bold btn-block">Selecionar foto</label>
         <input type="file" class="form-control-file" style="display:none;" id="inputFileForm">
         <span id="fileName" style="display:none;"></span>
         <input id="srcFileText" class="form-control font-weight-bold" type="text" placeholder="Selecione o arquivo..." style="background-color: white;font-size:large;" readonly>
         <input type="hidden" name="img" id="imgProduto" value=" " />
		</div>-->
		
 
		<!-- Code -->
        @if(isset($dadosProduto))
 	     <input  type="hidden"  id="id_codigo" name="id" value="{{ $dadosProduto[0]->id }}" />		
		@endif
		
	   <!-- Codigo -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Codigo:</label>
        <div class="col-sm-9">
		 @if(isset($dadosProduto))
		  <input type="text" class="form-control" id="txtCodigo" name="codigo" value="{{ $dadosProduto[0]->codigo }}" placeholder="Digite o Codigo do produto..." required autofocus>
          @else
		  <input type="text" class="form-control" id="txtCodigo" name="codigo" placeholder="Digite o Codigo do produto..." required autofocus>
         @endif
        </div>
       </div>
	   
	   <!-- Nome -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Nome:</label>
        <div class="col-sm-9">
		 @if(isset($dadosProduto))
		  <input type="text" class="form-control" id="txtNome" name="nome" value="{{ $dadosProduto[0]->nome }}" placeholder="Digite o nome do produto..." required autofocus>
          @else
		  <input type="text" class="form-control" id="txtNome" name="nome" placeholder="Digite o nome do produto..." required autofocus>
         @endif
        </div>
       </div>
	   
	   <!-- EAN -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">EAN:</label>
        <div class="col-sm-9">
		 @if(isset($dadosProduto))
		  <input type="text" class="form-control" id="txtEAN" name="ean" value="{{ $dadosProduto[0]->ean }}" placeholder="Digite o codigo de barras do produto..." required autofocus>
          @else
		  <input type="text" class="form-control" id="txtEAN" name="ean" placeholder="Digite o codigo de barras do produto..." required autofocus>
         @endif
        </div>
       </div>
	   
	   <!-- Fornecedor -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Fornecedor:</label>
        <div class="col-sm-9">
		 @if(isset($dadosProduto))
		   <input type="text" class="form-control" id="txtFornecedor" name="fornecedor" value="{{ $dadosProduto[0]->fornecedor }}" placeholder="Digite o fornecedor do produto..." required autofocus>
          @else
		   <input type="text" class="form-control" id="txtFornecedor" name="fornecedor" placeholder="Digite o fornecedor do produto..." required autofocus>
         @endif
        </div>
       </div>
	   
	   <!-- Sub-Especie -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Sub-Especie:</label>
        <div class="col-sm-9">
		 <select class="form-control" id="cb_localizacao" name="sub_especie"> 
          <option  value="default" selected>Seleciona a Sub-Especie do produto....</option>		 
	      @foreach($dadosSubEspecie as $item)  
   	        @if(isset($dadosProduto) &&  $dadosProduto[0]->sub_especie == $item->sub_especie)
     	      <option value="{{ $item->sub_especie }}" selected>{{ $item->sub_especie }}</option>
		      @else
		      <option value="{{ $item->sub_especie }}">{{ $item->sub_especie }}</option>  			  
              @endif     
		     @endforeach
		 </select>	
        </div>
       </div>
 		 		 	
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

