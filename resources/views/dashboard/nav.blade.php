<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky bg-primary">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active bg-light text-primary font-weight-bold" href="{{ route('dashboard') }}">
                  <img src="{{ asset('img/icons/home.png') }}" style="filter: white(100%);" width="20px" height="20px"></img>                   
				    Home<span class="sr-only"></span>
                </a>
              </li>

			   <div id="main-menu" class="list-group">
				<a href="#sub-menu" class="list-group-item bg-white font-weight-bold" data-toggle="collapse" data-parent="#main-menu"><img src="{{ asset('img/icons/home.png') }}" width="20px" height="20px"></img>  Cadastro <span class="caret"></span></a>
                <div class="collapse list-group-level1" id="sub-menu">
                    <a href="{{ route('dashboard.cadastro.produto') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Produto</a>
                    <a href="{{ route('dashboard.cadastro.estoque') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Estoque</a>
                    <a href="{{ route('dashboard.cadastro.endereco') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Endereço</a>
                    <a href="{{ route('dashboard.cadastro.tipo_endereco') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Tipo do Endereço</a>
                    <a href="{{ route('dashboard.cadastro.lote') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Lote</a>
                    <a href="{{ route('dashboard.cadastro.localizacao') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Localização</a>
                    <a href="{{ route('dashboard.cadastro.subEspecie') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Sub-Especie</a>
                </div>
			   </div>
			   
			    <div id="main-menu" class="list-group">
				<a href="#sub-menu" class="list-group-item bg-white font-weight-bold" data-toggle="collapse" data-parent="#main-menu"><img src="{{ asset('img/icons/home.png') }}" width="20px" height="20px"></img>  Relatório <span class="caret"></span></a>
                <div class="collapse list-group-level1" id="sub-menu">
                    <a href="#" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Produto</a>
                    <a href="#" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Estoque</a>
                    <a href="#" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Endereço</a>
                    <a href="#" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Tipo de Endereço</a>
                    <a href="#" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Lote</a>
                    <a href="#" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu">- Sub-Especie</a>
                </div>
			   </div>
			   
				<div id="main-menu" class="list-group">
				<a href="#sub-menu" class="list-group-item bg-white font-weight-bold" data-toggle="collapse" data-parent="#main-menu"><img src="{{ asset('img/icons/home.png') }}" width="20px" height="20px"></img>  Configuração <span class="caret"></span></a>
                <div class="collapse list-group-level1" id="sub-menu">
                    <a href="{{ route('dashboard.configuracao.importacao') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu"> - Importação</a>
                    <a href="{{ route('dashboard.configuracao.exportacao') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu"> - Exportação</a>
                    <a href="{{ route('dashboard.configuracao.usuarios') }}" class="list-group-item font-weight-bold bg-primary text-white" data-parent="#sub-menu"> - Usuários</a>
                </div>
			   </div> 
			   
            </ul>
          </div>
        </nav>
		
		<!-- List com sub-menu --
		<div id="main-menu" class="list-group">
				<a href="#sub-menu" class="list-group-item bg-white font-weight-bold" data-toggle="collapse" data-parent="#main-menu"><img src="{{ asset('img/icons/home.png') }}" width="20px" height="20px"></img>  Cadastro <span class="caret"></span></a>
                <div class="collapse list-group-level1" id="sub-menu">
                    <a href="#" class="list-group-item" data-parent="#sub-menu">Sub Item 1</a>
                    <a href="#" class="list-group-item" data-parent="#sub-menu">Sub Item 2</a>
                    <a href="#sub-sub-menu" class="list-group-item" data-toggle="collapse" data-parent="#sub-menu">Sub Item 3 <span class="caret"></span></a>
                    <div class="collapse list-group-level2" id="sub-sub-menu">
                        <a href="#" class="list-group-item" data-parent="#sub-sub-menu">Sub Sub Item 1</a>
                        <a href="#" class="list-group-item" data-parent="#sub-sub-menu">Sub Sub Item 2</a>
                        <a href="#" class="list-group-item" data-parent="#sub-sub-menu">Sub Sub Item 3</a>
                    </div>
                </div>
			   </div>-->