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
            <h1 class="h2">Configuração / Adicionar Usuário</h1>        
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
      </br>
	  <label for="txtPassword" class="text-white h5">Nivel da senha:</label> 
	   <div class="progress">
        <div class="progress-bar bg-danger text-white" role="progressbar" id="passParameter" style="font-size: large;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
       </div>
  </div>

  <button type="submit" class="btn btn-light btn-block">Cadastrar</button>
  <button type="submit" class="btn btn-light btn-block">Tabela de usuários</button>

    </form>	
	
</div>
<!-- End form add login-->

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
  if (password.match(/[$@#&!]+/)) {
    strength += 1;

  }
  
  switch (strength) {
    case 0:
      strengthbar.value = 0;
	  strengthbar.style.width = "0%";
	  strengthbar.innerHTML = "0%";
      break;

    case 1:
      strengthbar.value = 25;
	  strengthbar.style.width = "25%";
	  strengthbar.innerHTML = "25%";
      break;

    case 2:
      strengthbar.value = 50;
	  strengthbar.style.width = "50%";
	  strengthbar.innerHTML = "50%";
      break;

    case 3:
      strengthbar.value = 75;
	  strengthbar.style.width = "75%";
	  strengthbar.innerHTML = "75%";
      break;

    case 4:
      strengthbar.value = 100;
	  strengthbar.style.width = "100%";
	  strengthbar.innerHTML = "100%";
      break;
  }
  
  changeProgresBarColor();
  
} 
   
function removeBackgroundAddOther(bgAdd){
   	for(var x = 0; x < removeBackground.length; x++ ){
	strengthbar.classList.remove(removeBackground[x]);
	//console.log(removeBackground[x]);
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
</script>
<!-- End JS Script--> 
@endsection('content')