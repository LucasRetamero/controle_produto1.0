<nav class="navbar navbar-dark fixed-top bg-light flex-md-nowrap p-0 shadow">
	  <a class="navbar-brand col-sm-3 col-md-2 mr-0 bg-light text-primary" href="#"><img src="{{ asset('img/icons/product.png') }}" width="30px" height="30px"><font size="4px"> Controle de produto</font></a>
	  <input class="form-control w-70" type="text" placeholder="Pesquisa rapida de nome do produto.." aria-label="Search">
      <form method="get" action="{{ route('login.deslogar') }}">
	  <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
		   <a href="#"><button type="submit" class="btn btn-danger">Deslogar</button></a>
          <!--<a class="nav-link bg-danger text-light" href="#">Deslogar</a>-->
        </li>
      </ul>
	 </form>
</nav>