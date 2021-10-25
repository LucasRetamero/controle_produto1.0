<style type="text/css">
.anyClass {
  height:150px;
  overflow-y: scroll;
}
</style>

<nav class="navbar navbar-dark fixed-top bg-light flex-md-nowrap p-0 shadow">
	 
	  <a class="navbar-brand col-sm-3 col-md-2 mr-0 bg-light text-primary" href="#"><img src="{{ asset('img/icons/product.png') }}" width="30px" height="30px"><font size="4px"> Controle de produto</font></a>
	    <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="{{ asset('img/icons/addIcon.png')}}" width="25px" height="25x"></img>Cadastrar
  </button>
  <div class="dropdown-menu anyClass" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('dashboard.cadastro.produto') }}">Produto</a>
    <a class="dropdown-item" href="{{ route('dashboard.cadastro.estoque') }}">Estoque</a>
    <a class="dropdown-item" href="{{ route('dashboard.cadastro.endereco') }}">Endereço</a>
    <a class="dropdown-item" href="{{ route('dashboard.cadastro.tipo_endereco') }}">Tipo do Endereço</a>
    <a class="dropdown-item" href="{{ route('dashboard.cadastro.lote') }}">Lote</a>
    <a class="dropdown-item" href="{{ route('dashboard.cadastro.localizacao') }}">Localização</a>
    <a class="dropdown-item" href="{{ route('dashboard.cadastro.subEspecie') }}">Sub-Especie</a>
  </div>
</div>	

<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="{{ asset('img/icons/addIcon.png')}}" width="25px" height="25x"></img>Configuração
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('dashboard.configuracao.usuarios') }}"> Login</a>
  </div>
</div>	
	   <form method="get" action="{{ route('login.deslogar') }}">
	   <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
	
	  <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
		   <a href="#"><button type="submit" class="btn btn-danger">Deslogar</button></a>
        </li>
      </ul>
	 </form>
</nav>