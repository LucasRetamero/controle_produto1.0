@extends('dashboard.default')

@section('title','Controle de produto - Dashboard / formulário de produto')

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

<!-- Fixed bottom -->
<div class="fixed-bottom">
<button class="btn float-right" onclick="document.getElementById('pills-profile-tab').click()"><img src="{{ asset('img/icons/estoqueIcons.png') }}" width="50px" height="50px" title="Cadastrar produto no estoque"></img></button>
<button class="btn float-right" onclick="document.getElementById('pills-home-tab').click()"><img src="{{ asset('img/icons/prodAddutoIcons.png') }}" width="50px" height="50px" title="Cadastrar produto"></img></button></a>
<a href="#topPage"><button class="btn float-right"><img src="{{ asset('img/icons/arrowIcons.png') }}" width="50px" height="50px" title="Redirecionar para o topo"></img></button></a>
</div>

<div class="container" id="topPage">
            <h1 class="h2">Cadastro / <a href="{{ route('dashboard.cadastro.produto') }}">Produto</a> / Formulário de produto</h1> 
            <hr style="border-top:3px solid #000">			
</div>
 
	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Formulário do produto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Formulário do estoque</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
  </li>
</ul>

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <!-- Product form -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Formulário do Produto</h1>
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
         <label for="dt_validade" class="h5">Data de Vencimento</label>
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
    
         <!-- Localização / Sub-Especie-->	
		 <div class="form-group">
          
		  <div class="row">  
		  
		  <div class="col">
		  
	       <label for="cb_localizacao" class="h5">Localização 
		   <button class="btn btn-light" style="font-size: large;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><img src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons"> </img> </button>
		   </label>
		  
           <select class="form-control" id="cb_localizacao">
           <option>Selecione a localização</option>
           <option>Administrador</option>
           <option>Gerência</option>
           <option>Produção</option>
           </select>
          </div>
		  
		  <div class="col">
	       <label for="cb_subEspecie" class="h5">Sub-Especie:
		   <button class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons"></img> </button>
		   </label>
		   
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
      
  </div>
     
  </div>
  
  </div>
   
  </br>   
  <!-- Actions buttons -->
  <center><div class="btn-group" role="group" aria-label="Basic example">
  
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons"></img> Gravar</button>
   </div>
   
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/reloadIcon.png') }}" class="imgIcons"></img> Atualizar</button>
  </div>
    
   
   <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/clearIcon.png') }}" class="imgIcons"></img> Limpar campos</button>
   </div>
   
   <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/editIcon.png') }}" class="imgIcons"></img> Editar</button>
   </div>
   
   <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/removeIcon.png') }}" class="imgIcons"></img> Remover</button>
   </div>

  </div></center>	
	 
 </form>

</div>
   
  </div>
  
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  
<!-- Estoque form -->
<div class="jumbotron bg-primary">
       
		<div class="container">
          <h1 class="h3 text-white">Formulário do estoque</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>
	
	<!-- Lista de informações do estoque -->
	<div class="accordion" id="accordionExample">
 
  <!-- Form do estoque-->
  <form class="form-signin">

  <!-- Informações do estoque -->
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseInfoEstoque" aria-expanded="true" aria-controls="collapseInfoEstoque">
          Informações
        </button>
      </h5>
    </div>

    <div id="collapseInfoEstoque" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        
    <div class="form-group">
    
      <div class="row">
		
	 <!-- Lote -->
      <div class="col">
	   <label for="cbNivelAcesso" class="h5">Lote:
	   <button class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons"> </img> </button>
	   </label>
 
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o lote</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	 <!-- Tipo do endereço -->
	  <div class="col">
	   <label for="cbNivelAcesso" class="h5">Tipo do endereço:
	   <button class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons"></img> </button>
	   </label>

        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione a tipo do endereço</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	   
      </div>
	</div>
	
    <div class="form-group">
      <div class="row">
	  
      <div class="col">
	   <label for="cbNivelAcesso" class="h5">Area:
	   <button class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons"> </img> </button>
	   </label>
	   
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione a area</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="h5">Rua:</label>
	   
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione a rua</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="h5">Predio:</label>
	   
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o predio</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="h5">Nivel:</label>

        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o nivel</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="h5">Apto:</label>
        
		<select class="form-control" id="cbNivelAcesso">
         <option>Selecione o apto</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
      </div>
	</div>
	  
	<small id="txtName" class="form-text text-muted"><!-- Small message --></small>
  </div>
	  </div>
    </div>
  </div><!-- Termina informações do estoque -->
  
  <!-- lista  do estoque -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseListaEstoque" aria-expanded="false" aria-controls="collapseTwo">
          Lista do estoque
        </button>
      </h5>
    </div>
    <div id="collapseListaEstoque" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      	
<!-- Tabela de informações do produto -->
<table class="table">

    <div class="container">
      <h1 class="h3">Info do produto no estoque</h1>
	  <hr style="border-top:3px solid #000">
    </div>
	
   <!-- inicio do formulario -->	
   <form class="form-signin">
  
  <thead class="thead">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Produto</th>
      <th scope="col">Lote</th>
      <th scope="col">Area</th>
      <th scope="col">Rua</th>
      <th scope="col">Predio</th>
      <th scope="col">Nivel</th>
      <th scope="col">Apto</th>
      <th scope="col">Menu</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row">01</td><!-- ID do estoque -->
      <td>ZACTRAN 100ML</td> <!-- Nome do produto -->
      <td>1120</td> <!-- Lote -->
      <td>D07</td> <!-- Area -->
      <td>001</td> <!-- Rua -->
      <td>002</td> <!-- Predio -->
      <td>000</td> <!-- Nivel -->
      <td>001</td> <!-- Apto -->
      <td><div class="btn-group" role="group" aria-label="Basic example">
   
   <!-- Editar -->
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="submit" class="btn btn-warning" style="font-size: large;"><img src="{{ asset('img/icons/editIcon.png') }}" class="imgIcons"></img> Editar</button>
   </div>
   
   <!-- Removar -->
   <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="submit" class="btn btn-danger text-white" style="font-size: large;"><img src="{{ asset('img/icons/removeIcon.png') }}" class="imgIcons"></img> Remover</button>
   </div>
	
   </div>
   </td>
      
    </tr>
    	
  </tbody>
   </form> <!-- fim do formulario -->
  </table>
	  </div>
    </div>
  </div><!-- Termina estoque -->
  </br>
  <!-- Actions buttons -->
  <center><div class="btn-group" role="group" aria-label="Basic example">
  
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons"></img> Gravar estoque</button>
   </div>
   
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/reloadIcon.png') }}" class="imgIcons"></img> Atualizar</button>
  </div>
     
   <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/clearIcon.png') }}" class="imgIcons"></img> Limpar campos</button>
   </div>
   
   <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/editIcon.png') }}" class="imgIcons"></img> Editar</button>
   </div>
   
   <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/removeIcon.png') }}" class="imgIcons"></img> Remover</button>
   </div>

  </div></center>	
 
 </form>
</div><!-- Termina lista do estoque -->
		
 	
</div>
</div>
  
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
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

