@extends('dashboard.default')


@section('content')

<!-- CSS from user form dashboard -->
<style type="text/css">
.confHr{
  border-top:3px solid #FFF;
}

thead{
	background-color: #6095EB;
	color: #FFF;
	font-size: large;
}
th,td{
 font-size:large;	
}
</style>


<div class="container">
            <h1 class="h2">Configuração / <a href="{{ route('dashboard.configuracao.usuarios') }}">Usuários</a> / Adicionar Usuário</h1> 
            <hr style="border-top:3px solid #000">			
</div>

<!-- Form add login -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Adicionar Usuário</h1>
		  <hr class="confHr">
        </div>
		
  <form class="form-signin">
  
  <div class="form-group">
    
      <div class="row">
      <div class="col">
	   <label for="txtLogin" class="text-white h5">Nome:</label>
       <input type="text" class="form-control" id="txtName"  placeholder="Digite o nome">
      </div>
      <div class="col">
	   <label for="txtLogin" class="text-white h5">Sobrenome:</label>
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
    <label for="cbNivelAcesso" class="text-white h5">Nivel de acesso:</label>
    <select class="form-control" id="cbNivelAcesso">
      <option>Selecione o nivel de acesso...</option>
      <option>Administrador</option>
      <option>Gerência</option>
      <option>Produção</option>
    </select>
  </div>
  
  <div class="form-group">
    <div class="row">
      <div class="col">
	  <label for="txtPassword" class="text-white h5">Senha:</label>
      <input type="password" class="form-control" id="txtPassword" placeholder="Digite a senha de acesso...">
      </div>
	  
      <div class="col">
	  <label for="txtPasswordAgain" class="text-white h5">Confirmação de Senha:</label>
      <input type="password" class="form-control" id="txtPasswordAgain" placeholder="Digite a senha novamente">
      </div>
	  
      </div>
	  
      </br>
	  
	  <label for="txtPassword" class="text-white h5">Nivel da senha:</label> 
	  <div class="progress">
        <div class="progress-bar bg-danger text-white" role="progressbar" id="passParameter" style="font-size: large;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
       </div>
  </div>
 
 <button type="submit" class="btn btn-light btn-block">Cadastrar</button>

    </form>
</div>
<!-- End form add login-->

<!-- Table of permissions -->
<table class="table">

    <div class="container">
      <h1 class="h3">Tabela de nivel de acesso</h1>
	  <hr style="border-top:3px solid #000">
    </div>
		
  <thead class="thead">
    <tr>
      <th scope="col">Função</th>
      <th scope="col">Administração</th>
      <th scope="col">Gerência</th>
      <th scope="col">Produção</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Adicionar itens</th>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
    </tr>
    <tr>
      <th scope="row">Editar itens</th>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/noIcon.png') }}"></td>
    </tr>  
    <tr>
      <th scope="row">Remover itens</th>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/noIcon.png') }}"></td>
    </tr>
    <tr>
      <th scope="row">Gerar Relatórios</th>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
    </tr>
    <tr>
      <th scope="row">Realizar Exportação</th>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/noIcon.png') }}"></td>
    </tr>
    <tr>
      <th scope="row">Realizar Importação</th>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/noIcon.png') }}"></td>
    </tr>
    <tr>
      <th scope="row">Gerenciar Usuários</th>
      <td><img src="{{ asset('img/icons/rightIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/noIcon.png') }}"></td>
      <td><img src="{{ asset('img/icons/noIcon.png') }}"></td>
    </tr>	
  </tbody>
</table>

<!-- JS Script -->
<script type="text/javascript">

var code = document.getElementById("txtPassword");

var strengthbar = document.getElementById("passParameter");

//All background color from bootstrap
var removeBackground = [
     'bg-primary',
	 'bg-secondary',
	 'bg-success',
	 'bg-danger',
	 'bg-warning',
	 'bg-info',
	 'bg-light',
	 'bg-dark',
	 'bg-white',
	 'bg-transparent'
     ];
code.addEventListener("keyup", function() {
	checkpassword(code.value);
});
   
function checkpassword(password) {
  var strength = 0;
  if (password.match(/[a-z]+/)) {
    strength += 1;
  }
  if (password.match(/[A-Z]+/)) {
    strength += 1;
  }
  if (password.match(/[0-9]+/)) {
    strength += 1;
  }
  if (password.match(/[$@#&!*]+/)) {
    strength += 1;

  }
  
  switch (strength) {
    case 0:
     changeProgessBar(0, "0%", "0%");
	 changeProgessBar(0, "3%", "0%");
      break;

    case 1:
	 changeProgessBar(25, "25%", "25%");
      break;

    case 2:
	   changeProgessBar(50, "50%", "50%");
      break;

    case 3:
	   changeProgessBar(75, "75%", "75%");
      break;

    case 4:
	  changeProgessBar(100, "100%", "100%");
      break;
  }
  
  changeProgresBarColor();
  
} 
   
function removeBackgroundAddOther(bgAdd){
   	for(var x = 0; x < removeBackground.length; x++ ){
	strengthbar.classList.remove(removeBackground[x]);
	}
	strengthbar.classList.add(bgAdd);
}

function changeProgresBarColor(){
	switch(strengthbar.value){
	  case 0:
	   removeBackgroundAddOther("bg-danger");
	   break;
	  case 50:
	   removeBackgroundAddOther("bg-warning");	
	   break;
	  case 75:
	   removeBackgroundAddOther("bg-success");
	   break;
	  default:
	   //Do something
	   break;
	}	
}

function changeProgessBar(valueProgress, widthProgress, innerHtmlProgress){
	  strengthbar.value = valueProgress;
	  strengthbar.style.width = widthProgress;
	  strengthbar.innerHTML = innerHtmlProgress;
}    
</script>
<!-- End JS Script--> 
@endsection('content')