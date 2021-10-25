@extends('dashboard.default')

@section('title','Controle de produto - Dashboard / formulário: Sub Especie')

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
            <h1 class="h2">Cadastro / <a href="{{ route('dashboard.cadastro.subEspecie') }}">Sub Especie</a> / Formulário: Sub Especie</h1> 
            <hr style="border-top:3px solid #000">			
</div>
 
 <!-- Message of query -->
 @if(isset($msgSuccess))
 <div class="alert alert-success h5" role="alert">
 {{ $msgSuccess }}
 </div>
 @endif
 
<!-- Product form -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Formulário: Sub Especie</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>

   <form method="post" action="{{ route('dashboard.cadastro.actions') }}" class="form-signin" onsubmit="return confirm('Deseja realmente executar essa açâo ?');">
   
   <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
		
	@if(isset($dadosSubEspecie))	
    <!-- ID --> 
       <input type="hidden" id="id"  name="id" value="{{ $dadosSubEspecie[0]->id }}">
	@endif
    
	<!-- Sub Especie -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Sub Especie:</label>
        <div class="col-sm-9">
		 @if(isset($dadosSubEspecie))
		  <input type="text" class="form-control" id="txtSubEspecie" name="sub_especie" value="{{ $dadosSubEspecie[0]->sub_especie }}" placeholder="Digite a Sub Especie..." required autofocus>
          @else
		  <input type="text" class="form-control" id="txtSubEspecie" name="sub_especie" placeholder="Digite a Sub Especie..." required autofocus>
         @endif
        </div>
       </div>
	
  </br>
  <!-- Actions buttons -->
  @if(!isset($dadosSubEspecie))
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="{{ asset('img\icons\addIcon.png') }}"></img>Cadastrar</button>
 @else
 </br><button type="submit" name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="{{ asset('img\icons\editIcon.png') }}" width="40px" height="40px"></img>Editar</button>
 </br><button type="submit" name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="{{ asset('img\icons\removeIcon.png') }}" width="40px" height="40px"></img>Remover</button>
 @endif
 </br><a href="{{ route('dashboard.cadastro.subEspecie') }}" class="btn btn-light btn-block" style="font-size:x-large;"><img src="{{ asset('img\icons\leftArrowIcon.png') }}" width="40px" height="40px"></img>Lista de Sub Especie</a>
  	
 
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

