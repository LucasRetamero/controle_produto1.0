@extends('dashboard.default')

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
    <h1 class="h2">Cadastro / Estoque</h1> 
    <hr style="border-top:3px solid #000">	
</div>

<!-- buttons actions -->
<div id="container">
  <div class="row">  
     <div class="col-sm-12 text-center">
      <h1 class="h3">Menu</h1>
       <a href="{{ route('dashboard.cadastro.estoque.estoqueAddForm') }}"><button id="btnAddProduct" class="btn btn-success font-weight-bold text-white"><img src="{{ asset('img/icons/addIcon.png') }}" class="imgIcons"/> Adicionar novo</button></a>
       <button id="btnQueryUser" class="btn btn-primary font-weight-bold text-white" onClick="hiddenOrShowQuerUser()"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons"/> Consultar</button>
     </div>
  </div>
</div>

</br>
<!-- Filter user List -->
<div id="containerQuery" class="hiddenDiv">
  <div class="row">  
         <div class="col-sm-12 text-center">
          <h1 class="h3">Consultar lista do estoque</h1>
     <form method="post" action="{{ route('dashboard.cadastro.estoque.searching') }}">
       <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />      
		       
	 <div class="form-row">
	  
        <!--<div class="col2">
         <div class="form-group">
          <select class="form-control" id="slctQuery">
           <option value="Nome" selected>Nome</option>
           <option value="Sobrenome">Sobrenome</option>
           <option value="Email">Email</option>
	       <option value="Login">Login</option>
           <option value="Nivel de acesso">Nivel de acesso</option>
         </select>
         </div>
        </div>-->
	
      <div class="col">
	    <div id="searchInput" class="form-group">
         <input type="text" id="nameSearchOrigin" name="nomeProdutoQuery" class="form-control" placeholder="Digite o nome do produto...">
        </div>    
	 </div>
		 
     </div>
	
	   <button type="submit" name="btnAction" value="nameQuery" class="btn btn-primary font-weight-bold"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons"/> Iniciar consulta</button>
	   <button type="submit" name="btnAction" value="allQuery" class="btn btn-success font-weight-bold"><img src="{{ asset('img/icons/FilterIcon.png') }}" class="imgIcons"/> Buscar Todos</button>
    
	</form>
         </div>
        </div>	
</div>

</br>
<!-- Table of users -->
<table class="table">
  <h1 class="h3 text-center">Lista do estoque</h1>
  <thead class="thead">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Produto</th>
      <th scope="col">Lote</th>
      <th scope="col">Tipo_Endereco</th>
      <th scope="col">Area</th>
      <th scope="col">Rua</th>
      <th scope="col">predio</th>
      <th scope="col">nivel</th>
      <th scope="col">apto</th>
      <th scope="col">Ações</th>
	  
    </tr>
  </thead>
  <tbody>
    @if($dados->count() > 0)
  @foreach($dados as $item)
    <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->nome_produto }}</td>
      <td>{{ $item->lote }}</td>
      <td>{{ $item->tipo_produto }}</td>
      <td>{{ $item->area }}</td>
      <td>{{ $item->rua }}</td>
      <td>{{ $item->predio }}</td>
      <td>{{ $item->nivel }}</td>
      <td>{{ $item->apto }}</td>
      <td>
	    <div class="row"> <!-- buttons edit /  remove--> 
		 <div class="col-sm-12 text-center">
        <a href="{{ route('dashboard.cadastro.produto.productAddForm.edit', $item->id) }}"><button id="btnUpdate" class="btn btn-warning btn-md center-block" name="btnAction" value="btnEdit"><img src="{{ asset('img/icons/editIcon.png') }}" class="imgIcons"/> Editar</button></a>
        <a href="{{ route('dashboard.cadastro.produto.productAddForm.remove', $item->id) }}" onclick="return confirm('Deseja realmente remover esse item ?')"><button id="btnUpdate" class="btn btn-danger btn-md center-block" name="btnAction" value="btnRemove"><img src="{{ asset('img/icons/removeIcon.png') }}" class="imgIcons" value="{{ $item->id }}"/> Remover</button></a>
         </div>
        </div> <!-- End buttons edit /  remove-->
	  </td>
    </tr>
   @endforeach
   @else
   <div class="alert alert-danger" role="alert">
    Nenhum item encontrado !
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