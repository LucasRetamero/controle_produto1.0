<style type="text/css">
.anyClass {
  height:150px;
  overflow-y: scroll;
}
</style>

<nav class="navbar navbar-dark fixed-top bg-light flex-md-nowrap p-0 shadow">
	 
	  <a class="navbar-brand col-sm-3 col-md-2 mr-0 bg-light text-primary" href="{{ route('dashboard') }}"><img src="{{ asset('img/icons/product.png') }}" width="30px" height="30px"><font size="4px"> Controle de produto</font></a>
	    <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="{{ asset('img/icons/addIcon.png')}}" width="25px" height="25x"></img>Cadastrar
  </button>
  <div class="dropdown-menu anyClass" aria-labelledby="dropdownMenuButton">
    <a href="{{ route('dashboard.cadastro.produto.productAddForm') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Produto</a>
                    <a href="{{ route('dashboard.cadastro.endereco.enderecoAddForm') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Endereço</a>
                    <a href="{{ route('dashboard.cadastro.subEspecie.subEspecieAddForm') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Sub-Especie</a>
					<a href="{{ route('dashboard.cadastro.tipo_endereco.tipoEnderecoAddForm') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Tipo Endereço</a>
                    <a href="{{ route('dashboard.cadastro.estoque.estoqueAddForm') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Logistico</a>
  </div>
</div>	

<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="{{ asset('img/icons/FilterIcon.png')}}" width="25px" height="25x"></img>Consultar
  </button>
  <div class="dropdown-menu anyClass" aria-labelledby="dropdownMenuButton">
     <a href="{{ route('dashboard.cadastro.produto') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Produto</a>
                    <a href="{{ route('dashboard.cadastro.endereco') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Endereço</a>
                    <a href="{{ route('dashboard.cadastro.subEspecie') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Sub-Especie</a>
                    <a href="{{ route('dashboard.cadastro.tipo_endereco') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Tipo Endereço</a>
                    <a href="{{ route('dashboard.cadastro.estoque') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Logistico</a>
  </div>
</div>

<div class="dropdown">
  <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="{{ asset('img/icons/documentManIcon.png')}}" width="25px" height="25x"></img>Relatório
  </button>
  <div class="dropdown-menu anyClass" aria-labelledby="dropdownMenuButton">
     <a href="{{ route('dashboard.pdf.produtos.configurarPdf') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Produto</a>
                    <a href="{{ route('dashboard.pdf.endereco.configurarPdf') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Endereço</a>
                    <a href="{{ route('dashboard.pdf.estoque.configurarPdf') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Inventário</a>
                    <a href="{{ route('dashboard.pdf.apuracao_ocorrencia.configurarPdf') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Apuração de Ocorrencia</a>
  </div>
</div>	

<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="{{ asset('img/icons/configurationIcon.png')}}" width="25px" height="25x"></img>Configuração
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  @if(Auth::User()->nivel_acesso == "administrador")  
  <a href="{{ route('dashboard.configuracao.usuarios') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Login</a>
  @endif
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