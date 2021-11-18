@extends('dashboard.default')

@section('title','Controle de produto - Dashboard / Formulário: Tipo do endereço')

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
            <h1 class="h2">Cadastro / <a href="{{ route('dashboard.cadastro.tipo_endereco') }}">Tipo Endereço</a> / Formulário: Tipo Endereç</h1> 
            <hr style="border-top:3px solid #000">			
</div>
 
<!-- Product form -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Formulário: Tipo Endereço</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>

   <form method="post" action="{{ route('dashboard.cadastro.tipo_endereco.tipo_enderecoForm.actionsMenu') }}" class="form-signin" onsubmit="return confirm('Deseja realmente executar essa açâo ?');">
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />      
	  
    @if(isset($dadosTipoEndereco))	
	   <input type="hidden" id="id_codigo"  name="id" value="{{ $dadosTipoEndereco[0]->id }}">
       <!--<small id="txtEmail" class="form-text text-muted"> Small message </small>-->
	@endif
    
	<!-- Tipo Endereco -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Tipo endereço:</label>
        <div class="col-sm-9">
		 @if(isset($dadosTipoEndereco))
		  <input type="text" class="form-control" id="txtSubEspecie" name="tipo_endereco" value="{{ $dadosTipoEndereco[0]->tipo_endereco }}" placeholder="Digite o Tipo Endereço..." required autofocus>
          @else
		  <input type="text" class="form-control" id="txtSubEspecie" name="tipo_endereco" placeholder="Digite o Tipo Endereço..." required autofocus>
         @endif
        </div>
       </div>
		
  </br>
  <!-- Actions buttons -->
  @if(!isset($dadosTipoEndereco))
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="{{ asset('img\icons\addIcon.png') }}"></img>Cadastrar</button>
 @else
 </br><button type="submit" name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="{{ asset('img\icons\editIcon.png') }}" width="40px" height="40px"></img>Editar</button>
 </br><button type="submit" name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="{{ asset('img\icons\removeIcon.png') }}" width="40px" height="40px"></img>Remover</button>
 @endif
 </br><a href="{{ route('dashboard.cadastro.tipo_endereco') }}" class="btn btn-light btn-block" style="font-size:x-large;"><img src="{{ asset('img\icons\leftArrowIcon.png') }}" width="40px" height="40px"></img>Lista Tipo Endereço</a>
  		
 
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

