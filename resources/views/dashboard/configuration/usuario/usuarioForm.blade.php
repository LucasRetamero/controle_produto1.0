@extends('dashboard.default')

@section('title', 'Dashboard / Formulário: Usuarios')

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

.hiddenComp{
 display: none;
}

.showComp{
 display: block;
}

.invalid-feedback {
    font-weight: bold;
    color: #FFF;
    font-size: 15px;
}
</style>


<div class="container">
            <h1 class="h2">Configuração / <a href="{{ route('dashboard.configuracao.usuarios') }}">Usuários</a> / Formulário: Usuários</h1>
            <hr style="border-top:3px solid #000">
</div>

@if(isset($errorMessage))
 <div class="alert alert-danger h5" role="alert">
 {{ $errorMessage }}
 </div>
 @endif

<!-- Form add login -->
<div class="jumbotron bg-primary">

		<div class="container">
		 <h1 class="h3 text-white">Formulário: Usuários</h1>
		 <hr class="confHr">
        </div>

  <form method="post" id="addUserForm" class="form-signin needs-validation" action="{{ route('login.addEditRemUsuario') }}" novalidate>
  <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

    <div class="form-group row">
    <label for="txtName" class="col-sm-2 text-white h5">Nome:</label>
    <div class="col-sm-9">
        <div class="input-group">
        @if(isset($dadoUsuario))
        <input type="hidden" name="id" value="{{ $dadoUsuario[0]->id }}"/>
        <input type="text" class="form-control" id="txtName" name="nome"  placeholder="Digite o nome" value="{{ $dadoUsuario[0]->nome }}" required autofocus>
        @else
        <input type="text" class="form-control" id="txtName" name="nome"  placeholder="Digite o nome" value="" required autofocus>
        @endif
        <div class="invalid-feedback">
            Campo Nome vazio !
        </div>
      </div>
    </div>
    </div>

    <div class="form-group row">
      <label for="txtLogin" class="col-sm-2 text-white h5">Sobrenome:</label>
       <div class="col-sm-9">
        @if(isset($dadoUsuario))
        <input type="text" class="form-control" id="txtSecondName" name="sobrenome"  placeholder="Digite o sobrenome" value="{{ $dadoUsuario[0]->sobrenome }}" required autofocus>
        @else
        <input type="text" class="form-control" id="txtSecondName" name="sobrenome"  placeholder="Digite o sobrenome" value="" required autofocus>
        @endif
        <div class="invalid-feedback">
            Campo Sobrenome vazio !
        </div>
      </div>
    </div>

    <div class="form-group row">
        <label for="txtEmail" class="col-sm-2 text-white h5">Email:</label>
         <div class="col-sm-9">
            @if(isset($dadoUsuario))
            <input type="email" class="form-control" id="txtEmail" name="email" value="{{ $dadoUsuario[0]->email }}" placeholder="Digite o email" required autofocus>
            @else
            <input type="email" class="form-control" id="txtEmail" name="email" value="" placeholder="Digite o email" required autofocus>
            @endif
            <div class="invalid-feedback">
                Campo Email vazio !
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="txtLogin" class="col-sm-2 text-white h5">Login:</label>
         <div class="col-sm-9">
            @if(isset($dadoUsuario))
            <input type="text" class="form-control" id="txtLogin"  name="login" value="{{ $dadoUsuario[0]->login }}" placeholder="Digite o login...." required autofocus>
            @else
            <input type="text" class="form-control" id="txtLogin"  name="login" value="" placeholder="Digite o login...." required autofocus>
            @endif
            <div class="invalid-feedback">
                Campo Login vazio !
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="txtLogin" class="col-sm-2 text-white h5">Empresa:</label>
         <div class="col-sm-9">
            <select class="form-control form-select" id="empresa_id" name="empresa_id" required>
                @if(isset($dadoUsuario) && $dadoUsuario[0]->empresa_id == "")
                <option  value="" disabled>Seleciona a Empresa</option>
                <option  value="adm" selected>Geral(acesso a todas as empresas)</option>
                @else
                <option  value="" selected disabled>Seleciona a Empresa</option>
                <option  value="adm">Geral(acesso a todas as empresas)</option>
                @endif
               @foreach($dadosEmpresa as $item)
                    @if(isset($dadoUsuario) &&  $dadoUsuario[0]->empresa_id == $item->id)
                    <option value="{{ $item->id }}" selected>{{ $item->fantasia }}</option>
                   @else
                   <option value="{{ $item->id }}">{{ $item->fantasia }}</option>
                   @endif
                  @endforeach
              </select>
               <div class="invalid-feedback">
                  Necessário selecionar uma Empresa
               </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="txtLogin" class="col-sm-2 text-white h5">Nivel de acesso:</label>
         <div class="col-sm-9">
            <select class="form-control" id="cbNivelAcesso" name="nivel_acesso" required>
                @if(isset($dadoUsuario))
                  @switch($dadoUsuario[0]->nivel_acesso)
                    @case('administrador')
                    <option value="administrador" selected>Administrador</option>
                    <option value="gerencia">Gerência</option>
                    <option value="producao">Produção</option>
                   @break
                   @case('gerencia')
                    <option value="administrador">Administrador</option>
                    <option value="gerencia" selected>Gerência</option>
                    <option value="producao">Produção</option>
                    @break
                    @case('producao')
                    <option value="administrador">Administrador</option>
                    <option value="gerencia">Gerência</option>
                    <option value="producao" selected>Produção</option>
                    @break
                  @endswitch
                @else
                  <option value="" selected disabled>Selecione o nivel de acesso do usuário</option>
                  <option value="administrador">Administrador</option>
                  <option value="gerencia">Gerência</option>
                  <option value="producao">Produção</option>
                @endif
              </select>
            <div class="invalid-feedback">
                Necessário selecionar um Nivel de Acesso !
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="txtLogin" class="col-sm-2 text-white h5">Senha:</label>
         <div class="col-sm-9">
            @if(isset($dadoUsuario))
            <input type="password" class="form-control" id="txtPassword" name="password" value="{{ $dadoUsuario[0]->password }}" placeholder="Digite a senha de acesso..." required autofocus>
            @else
            <input type="password" class="form-control" id="txtPassword" name="password" placeholder="Digite a senha de acesso..." required autofocus>
            @endif
            <div class="invalid-feedback">
                Campo Senha vazio !
            </div>
        </div>
      </div>

  <div class="form-group">
	  <label for="txtPassword" class="text-white h5">Nivel da senha:</label>
	  <div class="progress">
        <div class="progress-bar bg-danger text-white" role="progressbar" id="passParameter" style="font-size: large;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
       </div>
  </div>

 @if(isset($dadoUsuario))
<button type="submit"  name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="{{ asset('img\icons\editIcon.png') }}" width="40px" height="40px"></img>Editar</button>
<button type="submit"  name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="{{ asset('img\icons\removeIcon.png') }}" width="40px" height="40px"></img>Remover</button>
</br>
<a href="{{ route('dashboard.configuracao.usuarios') }}"><button type="button"  class="btn btn-light btn-block" style="font-size:x-large;"><img src="{{ asset('img\icons\NoIcon.png') }}" width="40px" height="40px"></img>Cancelar</button></a>
 @else
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="{{ asset('img\icons\addIcon.png') }}"></img>Cadastrar</button>
 </br>
 <a href="{{ route('dashboard.configuracao.usuarios') }}"><button type="button"  class="btn btn-light btn-block" style="font-size:x-large;"><img src="{{ asset('img\icons\NoIcon.png') }}" width="40px" height="40px"></img>Cancelar</button></a>
 @endif
	</form>
</div>
<!-- End form add login-->

<!-- JS Script -->
<script>
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


// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
<!-- End JS Script-->
@endsection('content')
