@extends('dashboard.default')

@section('content')

<div class="container">
            <h1 class="h2">Cadastro / <a href="{{ route('dashboard.cadastro.produto') }}">Produto</a> / Formulário de produto</h1> 
            <hr style="border-top:3px solid #000">			
</div>

<!-- Product form -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Formulário de Produto</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>
		
	<form class="form-signin">
	
	<div class="accordion" id="accordionExample">
  
  <div class="card">
  
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" style="font-size: large;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         Informações
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        
		<!-- Photo -->
	    <div class="form-group mx-auto" style="width: 200px;">
         <label for="txtLogin" class="h5">Imagem do produto</label>
	     <img src="{{ asset('img/icons/defaultProductIcon.png')}}" width="200px" height="200px"/>
         <small id="txtEmail" class="form-text text-muted"><!-- Small message --></small>
	     <label for="inputFileForm" class="btn btn-primary font-weight-bold btn-block">Selecionar foto</label>
         <input type="file" class="form-control-file" style="display:none;" id="inputFileForm">
         <span id="fileName" style="display:none;"></span>
         <input id="srcFileText" class="form-control font-weight-bold" type="text" placeholder="Selecione o arquivo..." style="background-color: white;font-size:large;" readonly>
        </div>
		
		<!-- Code -->
		<div class="form-group">
         <label for="id_codigo" class="h5">Codigo</label>
         <input type="text" class="form-control" id="id_codigo"  placeholder="Codigo do produto.....">
         <small id="txtEmail" class="form-text text-muted"><!-- Small message --></small>
        </div>
		
		<!-- EAN(Barcode) -->
		<div class="form-group">
         <label for="txt_ean" class="h5">EAN(Codigo de Barras)</label>
         <input type="text" class="form-control" id="txt_ean"  placeholder="Digite EAN(Codigo de barras).....">
         <small id="smTxt_ean" class="form-text text-muted"><!-- Small message --></small>
        </div>
		
		<!-- Name -->
		<div class="form-group">
         <label for="txt_nome" class="h5">Nome:</label>
         <input type="text" class="form-control" id="txt_nome"  placeholder="Digite o nome.....">
         <small id="smTxt_nome" class="form-text text-muted"><!-- Small message --></small>
        </div>
		
		<!-- Fabrication date -->
		<div class="form-group">
         <label for="dt_fabricacao" class="h5">Data de Fabricação</label>
         <input type="date" class="form-control" id="dt_fabricacao">
         <small id="smDt_fabricacao" class="form-text text-muted"><!-- Small message --></small>
        </div>
		
		<!-- Expiration date -->
		<div class="form-group">
         <label for="dt_validade" class="h5">Data de Validade</label>
         <input type="date" class="form-control" id="dt_validade">
         <small id="smDt_fabricacao" class="form-text text-muted"><!-- Small message --></small>
        </div>
  
	  </div>
    </div>
	
  </div>
  
  <div class="card">
  
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" style="font-size: large;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         Quantidade
        </button>
      </h5>
    </div>
	
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
	  
 	
		<!-- Quantity -->
        <div class="form-group">
    
         <div class="row">
		 
		  <div class="col">
	       <label for="txt_atualQtd" class="h5">Quantidade atual</label>
           <input type="text" class="form-control" id="txt_atualQtd"  placeholder="Digite a quantidade atual no estoque....">
           <small id="smTxt_atualQtd" class="form-text text-muted"><!-- Small message --></small> 
		  </div>
		  
    	  <div class="col">
	       <label for="txt_minQtd" class="h5">Quantidade minima</label>
           <input type="text" class="form-control" id="txt_minQtd"  placeholder="Digite a quantidade minima desejada....">
           <small id="smTxt_minQtd" class="form-text text-muted"><!-- Small message --></small>
          </div>
	
         </div>
		
	  </div>
    </div>
	
  </div>
  
  <div class="card">
  
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" style="font-size: large;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Categoria
        </button>
      </h5>
    </div>
	
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
    
         <!-- Endereçamento / Localização-->	
		 <div class="form-group">
          
		  <div class="row">  
		  
		   <div class="col">
	        <label for="cb_tipoEnderecamento" class="h5">Tipo do endereçamento</label>
            <select class="form-control" id="cb_tipoEnderecamento">
            <option>Selecione o tipo do endereçamento</option>
            <option>Administrador</option>
            <option>Gerência</option>
            <option>Produção</option>
            </select>
           </div>
	      
		  <div class="col">
	       <label for="cb_localizacao" class="h5">Localização</label>
           <select class="form-control" id="cb_localizacao">
           <option>Selecione a localização</option>
           <option>Administrador</option>
           <option>Gerência</option>
           <option>Produção</option>
           </select>
          </div>
		  
         </div>
        </div>
		
       <!-- Sub-Especie -->
       <div class="form-group">
        <label for="cb_subEspecie" class="h5">Sub-Especie:</label>
        <select class="form-control" id="cb_subEspecie">
        <option>Selecione a Sub-Especie</option>
        <option>Administrador</option>
        <option>Gerência</option>
        <option>Produção</option>
        </select> 
	   </div>
		
      </div>
    </div>
	
  </div>
  
</div>

	</form>


</div>

<!-- Product form -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Formulário do estoque</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>
		
  <form class="form-signin">
     
  <div class="form-group">
    
      <div class="row">
	  
      <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Lote:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o lote</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Categoria do endereço:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione a categoria do endereço</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	   
      </div>
	  
	<small id="txtName" class="form-text text-muted"><!-- Small message --></small>
  </div>
   
  <div class="form-group">
    
      <div class="row">
	  
      <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Area:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione a area</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Rua:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione a rua</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Predio:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o predio</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Nivel:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o nivel</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Apto:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o apto</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
      </div>
	  
	<small id="txtName" class="form-text text-muted"><!-- Small message --></small>
  </div>
  
 <button type="submit" class="btn btn-light btn-block">Adicionar estoque</button>

    </form>	
	
</div>


<!-- JS Script -->
<script type="text/javascript">
var $input    = document.getElementById('inputFileForm'),
     $fileName = document.getElementById('fileName');

 $input.addEventListener('change', function(){
	$fileName.textContent = document.getElementById('srcFileText').value = this.value;	
 });
</script>
@endsection

