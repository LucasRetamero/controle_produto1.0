@extends('dashboard.default')
<!--  Add User form dashboard -->

<!-- CSS from user form dashboard -->
<style type="text/css">
.confHr{
  border-top:3px solid #FFF;
}
</style>
<!-- End CSS from user form dashboard -->
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><a href="{{ route('dashboard.configuracao') }}">Configuração</a> / Adicionar Usuário</h1>        
</div>

<!-- Form add login -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Adicionar Usuário</h1>
		  <hr class="confHr">
        </div>
		
  <form class="form-signin">
  
  <div class="form-group">
    <label for="txtLogin" class="text-white h5">Nome | Sobrenome:</label>
      <div class="row">
      <div class="col">
       <input type="text" class="form-control" id="txtName"  placeholder="Digite o nome">
      </div>
      <div class="col">
       <input type="text" class="form-control" id="txtSecondName"  placeholder="Digite o sobrenome">
      </div>
      </div>
	<small id="txtName" class="form-text text-muted"><!-- Small message --></small>
  </div>
  
  <div class="form-group">
    <label for="txtEmail" class="text-white h5">Emai:</label>
    <input type="email" class="form-control" id="txtEmail"  placeholder="Digite o email">
    <small id="txtEmail" class="form-text text-muted"><!-- Small message --></small>
  </div>
  
  <div class="form-group">
    <label for="txtLogin" class="text-white h5">Login:</label>
    <input type="text" class="form-control" id="txtLogin"  placeholder="Digite o login....">
    <small id="txtLogin" class="form-text text-muted"><!-- Small message --></small>
  </div>
  
  <div class="form-group">
    <label for="txtPassword" class="text-white h5">Senha:</label>
    <input type="password" class="form-control" id="txtPassword" placeholder="Digite a senha de acesso...">
  </div>

  <button type="submit" class="btn btn-light btn-block">Cadastrar</button>
  <button type="submit" class="btn btn-light btn-block">Tabela de usuários</button>

    </form>	
	
</div>
<!-- End form add login--> 
@endsection('content')