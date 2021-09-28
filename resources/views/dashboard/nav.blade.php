<nav class="col-md-2 d-none d-md-block bg-light ctl-dashnavsb sidebar">
    <div class="sidebar-sticky bg-primary ctl-dashnav">
        <!-- New List -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{route('dashboard')}}"><img src="{{asset('img/icons/icon_dashboard.png')}}"> Dashboard </a>
            </li>

            <li class="nav-item">
                <a href="#menu" data-toggle="collapse" class="ctl-droparrow" aria-expanded="false"><img src="{{asset('img/icons/addIcon.png')}}"> Cadastro </a>
            </li>
            <div class="collapse list-group-level1" id="menu">
                <a href="{{route('dashboard.cadastro.produto')}}" class="list-group-item">- Produto</a>
                <a href="{{route('dashboard.cadastro.estoque')}}" class="list-group-item">- Estoque</a>
                <a href="{{route('dashboard.cadastro.endereco')}}" class="list-group-item">- Endereço</a>
                <a href="{{route('dashboard.cadastro.tipo_endereco.tipoEndereco') }}" class="list-group-item">- Tipo do Endereço</a>
                <a href="#" class="list-group-item">- Lote</a>
                <a href="#" class="list-group-item">- Localização</a>
                <a href="#" class="list-group-item">- Sub-Especie</a>
            </div>

            <li class="nav-item">
                <a href="#menu2" data-toggle="collapse" class="ctl-droparrow" aria-expanded="false"><img src="{{asset('img/icons/icon_dashanalyst.png')}}"> Relatório </a>
            </li>
            <div class="collapse list-group-level1" id="menu2">
                <a href="{{route('dashboard.cadastro.produto')}}" class="list-group-item">- Produto</a>
                <a href="{{route('dashboard.cadastro.estoque')}}" class="list-group-item">- Estoque</a>
                <a href="{{route('dashboard.cadastro.endereco')}}" class="list-group-item">- Endereço</a>
                <a href="{{route('dashboard.cadastro.tipo_endereco.tipoEndereco') }}" class="list-group-item">- Tipo do Endereço</a>
                <a href="#" class="list-group-item font-weight-bold bg-primary text-white">- Lote</a>
                <a href="#" class="list-group-item font-weight-bold bg-primary text-white">- Localização</a>
                <a href="#" class="list-group-item font-weight-bold bg-primary text-white">- Sub-Especie</a>
            </div>

            <li class="nav-item">
                <a href="#menu3" data-toggle="collapse" class="ctl-droparrow" aria-expanded="false"><img src="{{asset('img/icons/icon_dashconfig.png')}}"> Configuração </a>
            </li>
            <div class="collapse list-group-level1" id="menu3">
                <a href="{{route('dashboard.configuracao.importacao')}}" class="list-group-item">- Importação</a>
                <a href="{{route('dashboard.configuracao.exportacao')}}" class="list-group-item">- Exportação</a>
                <a href="{{route('dashboard.configuracao.usuarios')}}" class="list-group-item">- Usuários</a>
            </div>

        </ul>
        <!-- Old list -->
        <!--
        <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active bg-light text-primary font-weight-bold" href="{{ route('dashboard') }}">
                  <img src="{{ asset('img/icons/icon_dashboard.png') }}" style="filter: white(100%);" width="20px" height="20px"></img>                   
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
        -->
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