@extends('dashboard.default')

@section('title','Fazendo Logistica - Dashboard / Relatório: Produto')

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
            <h1 class="h2">Relatório / Produto / Configuração: Produto</h1> 
            <hr style="border-top:3px solid #000">			
</div>
<!-- Return message from query -->
 @if(isset($msgError) )
   <div class="alert alert-danger h5" role="alert">
    {{ $msgError }}
  </div>
 @endif
 
 @if($errors->any())
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
          <h1 class="h3 text-white">Relatório: Produto</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>

  <div id="containerQuery" class="hiddenDiv"> 
         <div class="col-sm-12">
     <form method="get" action="{{ route('dashboard.pdf.produtos.actionsMenu') }}" target="_blank">
      
	  <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />      
	
	
	  <div class="form">
	  
        <div class="col2">
         <div class="form-group">
          <label  class="col text-white h4">Selecione o tipo do relatório</label>
   		   <select class="form-control" id="slctQuery" name="cbQuery">
           <option value="nome">Nome</option>
           <option value="codigo">Codigo</option>
           <option value="ean">EAN</option>
           <option value="fornecedor">Fornecedor</option>
	       <option value="subEspecie">Sub-Especie</option>
	       <option value="noFilter" selected>Buscar todos sem Sem Filtro</option>
          </select>
         </div>
        </div> 
		
		<div class="col2">
         <div class="form-group">
          <label  class="col text-white h4">Selecione o modelo do relatório:</label>
   		   <select class="form-control" id="slctQuery" name="cbMode">
           <option value="excel">Excel</option>
	       <option value="pdf" selected>PDF</option>
          </select>
         </div>
        </div>
	
     <div class="col2">
      <label  class="col text-white h4">Digite a consulta:</label>	
       <div id="searchInput" class="form-group">
         <input type="text" id="nameSearch" name="consulta" class="form-control" placeholder="Digite para pesquisar sobre o produto...">
        </div>    
	 </div>
		
	   
		  
     </div>
	
	   <button type="submit" name="btnAction" value="nameQuery" class="btn btn-success btn-block" style="font-size:x-large;"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons"/> Gerar Relatório</button>
	   <a href="{{ route('dashboard.cadastro.produto') }}" target="_blank" class="btn btn-light btn-block" style="font-size:x-large;"><img src="{{ asset('img\icons\leftArrowIcon.png') }}" width="40px" height="40px"></img>Lista de Produtos</a>
  
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

