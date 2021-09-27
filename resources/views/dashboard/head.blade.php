<nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow ctl-head-menu">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0 bg-light text-primary" href="#"><img src="{{ asset('img/icons/product.png') }}" width="30px" height="30px">
		<font size="4px"> Controle de produto</font>
	</a>
	
	<div class="ml-3 mr-auto text-primary">
		<h4>Dashboard</h4>
	</div>
	<!--input class="form-control w-70" type="text" placeholder="Pesquisa rapida de nome do produto.." aria-label="Search"-->

    <div class="dropdown">
	  	<a class="ctl-user-menu text-primary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
	  		<img src="{{asset('img/icons/product.png')}}" width="30px" height="30px"><div class="name"> Nome do Usuario </div>
	  	</a>

	  	<ul class="dropdown-menu ctl-dropdown-right" aria-labelledby="dropdownMenuLink">
	    	<li><a class="dropdown-item" href="#">Perfil</a></li>
	    	<li><a class="dropdown-item" href="#">Configurações</a></li>
	    	<li><a class="dropdown-item" href="#">Sair</a></li>
	  	</ul>
	</div>
</nav>
