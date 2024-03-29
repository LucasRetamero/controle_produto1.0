@extends('dashboard.default')

@section('title','Fazendo Logistica - Dashboard / Configuração: Empresa')

@section('content')
<!-- CSS from user dashboard -->
<style type="text/css">

thead{
	background-color: #6095EB;
	color: #FFF;
	font-size: large;
}

td{
  font-size: large;
  font-weight: bolder;
}

#btnUpdate,
#btnRemove{
    display: inline-block;
    vertical-align: top;
}

.imgIcons{
 width: 30px;
 height: 30px;
}

.hiddenDiv{
 display: none;
}

.showDiv{
 display: block;
}
</style>

<div class="container">
  <h1 class="h3">Configuração / Empresa</h1>
  <hr style="border-top:3px solid #000">
</div>

<!-- buttons actions -->
<div id="container">
  <div class="row">
         <div class="col-sm-12 text-center">
          <h1 class="h3">Menu</h1>
     	  <a href="{{ route('dashboard.configuracao.empresa.form') }}"><button id="btnAddUser" class="btn btn-success font-weight-bold text-white"><img src="{{ asset('img/icons/userAddIcon.png') }}" class="imgIcons"/> Adicionar novo</button></a>
          <button id="btnQueryUser" class="btn btn-primary font-weight-bold text-white" onClick="hiddenOrShowQuerUser()"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons"/> Consultar</button>
         </div>
        </div>
</div>

</br>
<!-- Filter user List -->
<div id="containerQuery" class="hiddenDiv">
  <div class="row">
         <div class="col-sm-12 text-center">
          <h1 class="h3">Consultar lista de empresas</h1>
     <form method="post" action="{{ route('dashboard.configuracao.empresa.filter') }}">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

        <div class="form-row">

        <div class="col2">
         <div class="form-group">
          <select class="form-control" id="slctQuery" name="cbQuery">
           <option value="razao_social" selected>Razão Social</option>
           <option value="fantasia">Fantasia</option>
	       <option value="cnpj">CNPJ</option>
           <option value="email">Email</option>
	       <option value="contato">Contato</option>
          </select>
         </div>
        </div>

      <div class="col">
	    <div id="searchInput" class="form-group">
         <input type="text" id="nameSearchOrigin" name="textSearch" class="form-control" placeholder="Digite para pesquisar a empresa...">
        </div>
	 </div>

     </div>

	   <button type="submit" class="btn btn-primary font-weight-bold"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons"/> Iniciar consulta</button>
	   <a href="{{ route('dashboard.configuracao.empresa')
	   }}"><button type="button" class="btn btn-primary font-weight-bold"><img src="{{ asset('img/icons/userAddIcon.png') }}" class="imgIcons"/> Buscar todos</button></a>

	</form>
         </div>
        </div>
</div>

</br>
<!-- Table of users -->
<table class="table">
  <h1 class="h3 text-center">Lista de Empresas</h1>
  <thead class="thead">
    <tr>
      <th scope="col">Razão Social</th>
      <th scope="col">fantasia</th>
      <th scope="col">CNPJ</th>
      <th scope="col">email</th>
      <th scope="col">contato</th>
      <th scope="col">Menu</th>

    </tr>
  </thead>
  <tbody>
  @if($dados->count() > 0)
    @foreach($dados as $item)
    <tr>
      <td>{{ $item->razao_social }}</td>
      <td>{{ $item->fantasia }}</td>
      <td>{{ $item->cnpj }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->contato }}</td>
      <td>
	    <div class="row"> <!-- buttons edit /  remove-->
		 <div class="col-sm-12 text-center">
          <a href="{{ route('dashboard.configuracao.empresa.form.edit', $item->id) }}"><button id="btnUpdate" class="btn btn-primary btn-md center-block" name="btnAction"><img src="{{ asset('img/icons/editIcon.png') }}" class="imgIcons" value="{{ $item->id }}"/> Editar</button></a>
         </div>
        </div> <!-- End buttons edit /  remove-->
	  </td>
    </tr>
    @endforeach
   @else
   <div class="alert alert-danger" role="alert">
    Nenhuma empresa encontrada !
   </div>
   @endif

  </tbody>
</table>

<!-- JS Script -->
<script type="text/javascript">
// Hidden or show div of query
function hiddenOrShowQuerUser(){
	switch(document.getElementById("containerQuery").className){
	 case "hiddenDiv":
       document.getElementById("containerQuery").classList.remove("hiddenDiv");
	   document.getElementById("containerQuery").classList.add("showDiv");
	  break;
	 case "showDiv":
	   document.getElementById("containerQuery").classList.remove("showDiv");
	   document.getElementById("containerQuery").classList.add("hiddenDiv");
	  break;
     default:
	 //Do something
	 break;
	}
}
</script>
@endsection
