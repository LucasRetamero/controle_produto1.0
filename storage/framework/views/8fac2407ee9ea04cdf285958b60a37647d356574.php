

<?php $__env->startSection('title', 'Dashboard / Formulário: Usuarios'); ?>

<?php $__env->startSection('content'); ?>

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
            <h1 class="h2">Configuração / <a href="<?php echo e(route('dashboard.configuracao.usuarios')); ?>">Usuários</a> / Formulário: Usuários</h1> 
            <hr style="border-top:3px solid #000">			
</div>

<!-- Form add login -->
<div class="jumbotron bg-primary">
        
		<div class="container">
		<?php if(isset($dadoUsuario)): ?>
		  <h1 class="h3 text-white">Editar Usuário</h1>
		<?php else: ?>
		  <h1 class="h3 text-white">Adicionar Usuário</h1>
        <?php endif; ?>		 
		 <hr class="confHr">
        </div>
		
  <form method="post" action="<?php echo e(route('login.addEditRemUsuario')); ?>"class="form-signin">
  <div class="form-group">
    
      <div class="row">
      <div class="col">
	   <label for="txtLogin" class="text-white h5">Nome:</label>
       <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
	   <?php if(isset($dadoUsuario)): ?>
	   <input type="hidden" name="id" value="<?php echo e($dadoUsuario[0]->id); ?>"/>
	   <input type="text" class="form-control" id="txtName" name="nome"  placeholder="Digite o nome" value="<?php echo e($dadoUsuario[0]->nome); ?>" required autofocus>
	   <?php else: ?>
	   <input type="text" class="form-control" id="txtName" name="nome"  placeholder="Digite o nome" value="" required autofocus>      
	   <?php endif; ?>
	  </div>
      <div class="col">
	   <label for="txtLogin" class="text-white h5">Sobrenome:</label>
       <?php if(isset($dadoUsuario)): ?>
	   <input type="text" class="form-control" id="txtSecondName" name="sobrenome"  placeholder="Digite o sobrenome" value="<?php echo e($dadoUsuario[0]->sobrenome); ?>" required autofocus>
       <?php else: ?>
	   <input type="text" class="form-control" id="txtSecondName" name="sobrenome"  placeholder="Digite o sobrenome" value="" required autofocus> 
	   <?php endif; ?>
	  </div>
      </div>
	<small id="txtName" class="form-text text-muted"><!-- Small message --></small>
  </div>
  
  <div class="form-group">
    <label for="txtEmail" class="text-white h5">Emai:</label>
    <?php if(isset($dadoUsuario)): ?>
	<input type="email" class="form-control" id="txtEmail" name="email" value="<?php echo e($dadoUsuario[0]->email); ?>" placeholder="Digite o email" required autofocus>
    <?php else: ?>
	<input type="email" class="form-control" id="txtEmail" name="email" value="" placeholder="Digite o email" required autofocus>
    <?php endif; ?>
	<small id="txtEmail" class="form-text text-muted"><!-- Small message --></small>
  </div>
  
  <div class="form-group">
    <label for="txtLogin" class="text-white h5">Login:</label>
    <?php if(isset($dadoUsuario)): ?>
	<input type="text" class="form-control" id="txtLogin"  name="login" value="<?php echo e($dadoUsuario[0]->login); ?>" placeholder="Digite o login...." required autofocus>
    <?php else: ?>
    <input type="text" class="form-control" id="txtLogin"  name="login" value="" placeholder="Digite o login...." required autofocus>
    <?php endif; ?>
	<small id="txtLogin" class="form-text text-muted"><!-- Small message --></small>
  </div>
  
    <div class="form-group">
    <label for="cbNivelAcesso" class="text-white h5">Nivel de acesso:</label>
    <select class="form-control" id="cbNivelAcesso" name="nivelAcesso" required>
	  <?php if(isset($dadoUsuario)): ?>
		<?php switch($dadoUsuario[0]->nivelAcesso):  
          case ('Administrador'): ?>
		  <option value="Administrador" selected>Administrador</option>
          <option value="Gerência">Gerência</option>
          <option value="Produção">Produção</option>
		  <?php break; ?>  
          <?php case ('Gerência'): ?>		  
	      <option value="Administrador">Administrador</option>   
		  <option value="Gerência" selected>Gerência</option>
          <option value="Produção">Produção</option>
		  <?php break; ?>
		  <?php case ('Produção'): ?>
		  <option value="Administrador">Administrador</option>
          <option value="Gerência">Gerência</option>
	      <option value="Produção" selected>Produção</option>
          <?php break; ?>
		<?php endswitch; ?>
	  <?php else: ?>
		<option value="" selected></option>
		<option value="Administrador">Administrador</option>
        <option value="Gerência">Gerência</option>
        <option value="Produção">Produção</option>  
	  <?php endif; ?>
	</select>
  </div>
  
  <div class="form-group">
    <div class="row">
      <div class="col">
	  <label for="txtPassword" class="text-white h5">Senha:</label>
	  <input type="password" class="form-control" id="txtPassword" name="password" value="" placeholder="Digite a senha de acesso..." required autofocus>
	  </div>
	    
      </div>
	  
      </br>
	  
	  <label for="txtPassword" class="text-white h5">Nivel da senha:</label> 
	  <div class="progress">
        <div class="progress-bar bg-danger text-white" role="progressbar" id="passParameter" style="font-size: large;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
       </div>
  </div>
 <?php if(isset($dadoUsuario)): ?>
<button type="submit"  name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="<?php echo e(asset('img\icons\editIcon.png')); ?>" width="40px" height="40px"></img>Editar</button>	 
<button type="submit"  name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="<?php echo e(asset('img\icons\removeIcon.png')); ?>" width="40px" height="40px"></img>Remover</button>	 
</br>
<a href="<?php echo e(route('dashboard.configuracao.usuarios')); ?>"><button type="button"  class="btn btn-light btn-block" style="font-size:x-large;"><img src="<?php echo e(asset('img\icons\NoIcon.png')); ?>" width="40px" height="40px"></img>Cancelar</button></a>	 
 <?php else: ?>
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="<?php echo e(asset('img\icons\addIcon.png')); ?>"></img>Cadastrar</button>
 </br>
 <a href="<?php echo e(route('dashboard.configuracao.usuarios')); ?>"><button type="button"  class="btn btn-light btn-block" style="font-size:x-large;"><img src="<?php echo e(asset('img\icons\NoIcon.png')); ?>" width="40px" height="40px"></img>Cancelar</button></a> 
 <?php endif; ?>
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
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
    </tr>
    <tr>
      <th scope="row">Editar itens</th>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/noIcon.png')); ?>"></td>
    </tr>  
    <tr>
      <th scope="row">Remover itens</th>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/noIcon.png')); ?>"></td>
    </tr>
    <tr>
      <th scope="row">Gerar Relatórios</th>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
    </tr>
    <tr>
      <th scope="row">Realizar Exportação</th>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/noIcon.png')); ?>"></td>
    </tr>
    <tr>
      <th scope="row">Realizar Importação</th>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/noIcon.png')); ?>"></td>
    </tr>
    <tr>
      <th scope="row">Gerenciar Usuários</th>
      <td><img src="<?php echo e(asset('img/icons/rightIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/noIcon.png')); ?>"></td>
      <td><img src="<?php echo e(asset('img/icons/noIcon.png')); ?>"></td>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/configuration/usuario/usuarioForm.blade.php ENDPATH**/ ?>