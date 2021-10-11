@extends('dashboard.default')

@section('title','Controle de produto - Dashboard / Formulário: Endereço')

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
            <h1 class="h2">Cadastro / <a href="{{ route('dashboard.cadastro.endereco') }}">Endereço</a> / Formulário: Endereço</h1> 
            <hr style="border-top:3px solid #000">			
</div>
 
<!-- Product form -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Formulário: Endereço</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>

   <form method="post" action="{{ route('dashboard.cadastro.endereco.enderecoForm.actionsMenu') }}" class="form-signin" onsubmit="return confirm('Deseja realmente executar essa açâo ?');">
   
   <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
	
    <!-- Codigo -->	
	@if(isset($dadosEndereco))	
	   <input type="hidden" id="id_codigo"  name="id" value="{{ $dadosEndereco[0]->id }}">
       <!--<small id="txtEmail" class="form-text text-muted"> Small message </small>-->
	@endif
	
	<!-- Area -->
		<div class="form-group">
         <label for="cbNivelAcesso" class="text-white h5">Area:</label>
         @if(isset($dadosEndereco))
		 <input type="text" class="form-control" id="txtArea"  name="area" value="{{ $dadosEndereco[0]->area }}" placeholder="Digite a area" required>
         @else
		 <input type="text" class="form-control" id="txtArea"  name="area" placeholder="Digite a area" required>
         @endif
	   <small id="txtEmail" class="form-text text-muted"><!-- Small message --></small>		 
		 </div>
		 
	
    <!-- Rua -->
		<div class="form-group">
         <label for="cbNivelAcesso" class="text-white h5">Rua:</label>
         @if(isset($dadosEndereco))
		 <input type="text" class="form-control" id="txtRua"  name="rua" value="{{ $dadosEndereco[0]->rua }}" placeholder="Digite a Rua" required>
         @else
		 <input type="text" class="form-control" id="txtRua"  name="rua" placeholder="Digite a Rua" required>
         @endif
	   <small id="txtEmail" class="form-text text-muted"><!-- Small message --></small>		 
		 </div>
		 
	<!-- Predio -->
		<div class="form-group">
        <label for="cbNivelAcesso" class="text-white h5">Predio:</label>  
       @if(isset($dadosEndereco))
		 <input type="text" class="form-control" id="txtPredio"  name="predio" value="{{ $dadosEndereco[0]->predio }}" placeholder="Digite o predio" required>
         @else
		 <input type="text" class="form-control" id="txtPredio"  name="predio" placeholder="Digite o predio" required>
         @endif 
		 <small id="txtEmail" class="form-text text-muted"><!-- Small message --></small> 
		 </div>
		 
	<!-- Nivel -->
		<div class="form-group">
         <label for="cbNivelAcesso" class="text-white h5">Nivel:</label>
         @if(isset($dadosEndereco))
		 <input type="text" class="form-control" id="txtNivel"  name="nivel" value="{{ $dadosEndereco[0]->nivel }}" placeholder="Digite o apto" required>
         @else
		 <input type="text" class="form-control" id="txtNivel"  name="nivel" placeholder="Digite o nivel" required>
         @endif
		 <small id="txtEmail" class="form-text text-muted"><!-- Small message --></small> 
		 </div>
		 
		 <!-- Apto -->
		<div class="form-group">
         <label for="cbNivelAcesso" class="text-white h5">Apto:</label>
        @if(isset($dadosEndereco))
		 <input type="text" class="form-control" id="txtApto"  name="apto" value="{{ $dadosEndereco[0]->apto }}" placeholder="Digite o apto" required>
         @else
		 <input type="text" class="form-control" id="txtApto"  name="apto" placeholder="Digite o apto" required>
         @endif
		 <small id="txtEmail" class="form-text text-muted"><!-- Small message --></small> 
		 </div>
		
  </br>
  <!-- Actions buttons -->
  @if(!isset($dadosEndereco))
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="{{ asset('img\icons\addIcon.png') }}"></img>Cadastrar</button>
 @else
 </br><button type="submit" name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="{{ asset('img\icons\editIcon.png') }}" width="40px" height="40px"></img>Editar</button>
 </br><button type="submit" name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="{{ asset('img\icons\removeIcon.png') }}" width="40px" height="40px"></img>Remover</button>
 @endif
 </br><a href="{{ route('dashboard.cadastro.endereco') }}" class="btn btn-light btn-block" style="font-size:x-large;"><img src="{{ asset('img\icons\NoIcon.png') }}" width="40px" height="40px"></img>Cancelar</a>
  		
 
 </form>
</div>
		
 	
</div>
</div>
  
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>

<!-- JS Script -->
<script type="text/javascript">

</script>
@endsection

