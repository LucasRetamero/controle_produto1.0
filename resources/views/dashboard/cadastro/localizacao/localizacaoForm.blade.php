@extends('dashboard.default')

@section('title','Controle de produto - Dashboard / formulário: Localização')

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
            <h1 class="h2">Cadastro / <a href="{{ route('dashboard.cadastro.localizacao') }}">Localização</a> / Formulário: Localização</h1> 
            <hr style="border-top:3px solid #000">			
</div>
 
<!-- Product form -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Formulário: Localização</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>

   <form class="form-signin">
   
    <!-- Codigo -->
     <div class="form-group">
       <label for="cbNivelAcesso" class="text-white h5">Codigo</label>
	   <input type="text" class="form-control" id="id_codigo"  placeholder="Codigo da localização.....">
       <small id="txtEmail" class="form-text text-muted"><!-- Small message --></small>
	  </div>
    
	<!-- Tipo do endereço --> 
		<div class="form-group">
         <label for="cbNivelAcesso" class="text-white h5">Localização</label>
         <input type="text" class="form-control" id="id_codigo"  placeholder="Digite a localização...">
       <small id="txtEmail" class="form-text text-muted"><!-- Small message --></small>		 
		 </div>
		
  </br>
  <!-- Actions buttons -->
  <center><div class="btn-group" role="group" aria-label="Basic example">
  
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons"></img> Gravar</button>
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

</script>
@endsection

