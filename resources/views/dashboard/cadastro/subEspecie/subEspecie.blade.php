@extends('dashboard.default')

@section('title','Fazendo Logistica - Dashboard')

@section('content')
<!-- CSS from page -->
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
    <h1 class="h2">Consultar / Sub Especie</h1>
    <hr style="border-top:3px solid #000">
</div>

<!-- buttons actions -->
<div id="container">
  <div class="row">
     <div class="col-sm-12 text-center">
      <h1 class="h3">Menu</h1>
        @if(Auth::User()->nivel_acesso == "administrador" || Auth::User()->nivel_acesso == "gerencia")
	   <a href="{{ route('dashboard.cadastro.subEspecie.subEspecieAddForm') }}"><button id="btnAddProduct" class="btn btn-success font-weight-bold text-white"><img src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons"/> Adicionar novo</button></a>
       @endif
	   <button id="btnQueryUser" class="btn btn-primary font-weight-bold text-white" onClick="hiddenOrShowQuerUser()"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons"/> Consultar</button>
     </div>
  </div>
</div>

</br>
<!-- Filter user List -->
<div id="containerQuery" class="hiddenDiv">
  <div class="row">
         <div class="col-sm-12 text-center">
          <h1 class="h3">Consultar lista de sub especie</h1>

          @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
            <form method="post" action="{{ route('dashboard.subespecie.filter.adm') }}">
                <div class="form-row">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control" id="txtSearchLote" name="sub_especie" placeholder="Digite a sub especie..." />
                </div>
                </div>

            </div>
            <h1 class="h4">Lista de empresa</h1>
            <div class="form-group row">
                <div class="col-sm-9">
                    <select class="form-control" id="cb_empresaId" name="empresa_id">
                        <option value="000" selected disabled>Seleciona a Empresa...</option>
                        @foreach ($dadosEmpresa as $item)
                            @if (isset($dadosEmpresa) && isset($itemSelected) && $itemSelected == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->razao_social }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->razao_social }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
                <button type="submit" name="btnAction" value="nameQuery" class="btn btn-primary font-weight-bold"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons"/> Iniciar consulta</button>
                <button type="submit" name="btnAction" value="allQuery" class="btn btn-success font-weight-bold"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons"/> Buscar Todos</button>

            </form>
      @else
        <form method="post" action="{{ route('dashboard.cadastro.subEspecie.searching') }}">
            <div class="form-row">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <div class="col">
            <div class="form-group">
                <input type="text" class="form-control" id="txtSearchLote" name="sub_especie" placeholder="Digite a sub especie..." />
            </div>
            </div>

        </div>

            <button type="submit" name="btnAction" value="nameQuery" class="btn btn-primary font-weight-bold"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons"/> Iniciar consulta</button>
            <button type="submit" name="btnAction" value="allQuery" class="btn btn-success font-weight-bold"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons"/> Buscar Todos</button>

        </form>
      @endif
         </div>
        </div>
</div>

</br>
<!-- Table of users -->
<table class="table">
  <h1 class="h3 text-center">Lista de Sub-Especie</h1>
  <thead class="thead">
    <tr>
      <th scope="col">Sub_Especie</th>
	  @if(Auth::User()->nivel_acesso == "administrador" || Auth::User()->nivel_acesso == "gerencia")
      <th scope="col">Menu</th>
      @endif

    </tr>
  </thead>
  <tbody>
  @if($dadosSubEspecie->count() > 0)
  @foreach($dadosSubEspecie as $item)
    <tr>
	  <td>{{ $item->sub_especie }}</td>
      <td>
	    <div class="row"> <!-- buttons edit /  remove-->
         <div class="col-sm-12 text-center">
          @if(Auth::User()->nivel_acesso == "administrador" || Auth::User()->nivel_acesso == "gerencia")
             @if (Auth::User()->nivel_acesso == 'administrador' && empty(Auth::User()->empresa_id))
                <a href="{{ route('dashboard.subespecie.formulario.adm', ['id' => $item->id, 'empresa_id' => $item->empresa_id]) }}"><button
                        id="btnUpdate" class="btn btn-warning btn-md center-block"><img
                            src="{{ asset('img/icons/editIcon.png') }}" class="imgIcons" />
                        Editar</button></a>
                <a href="{{ route('dashboard.cadastro.subEspecie.remove', $item->id) }}"
                    onclick="return confirm('Deseja realmente remover esse item ?')"><button
                        id="btnRemove" class="btn btn-danger btn-md center-block"><img
                            src="{{ asset('img/icons/removeIcon.png') }}" class="imgIcons" />
                        Remover</button></a>
            @else
            <a href="{{ route('dashboard.cadastro.subEspecie.edit', $item->id) }}"><button id="btnUpdate" class="btn btn-warning btn-md center-block"><img src="{{ asset('img/icons/editIcon.png') }}" class="imgIcons"/> Editar</button></a>
            <a href="{{ route('dashboard.cadastro.subEspecie.remove', $item->id) }}" onclick="return confirm('Deseja realmente remover essa item ?')"><button id="btnRemove" class="btn btn-danger btn-md center-block"><img src="{{ asset('img/icons/removeIcon.png') }}" class="imgIcons"/> Remover</button></a>
            @endif

          @endif
		 </div>
        </div> <!-- End buttons edit /  remove-->
	  </td>
    </tr>
  @endforeach
   @else
   <div class="alert alert-danger" role="alert">
    Nenhuma Item encontrado !
   </div>
   @endif

  </tbody>
</table>


<!-- JS from page -->
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
