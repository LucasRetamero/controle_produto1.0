

<?php $__env->startSection('content'); ?>

<div class="container">
            <h1 class="h2">Cadastro / <a href="<?php echo e(route('dashboard.cadastro.produto')); ?>">Produto</a> / Adicionar Produto</h1> 
            <hr style="border-top:3px solid #000">			
</div>

<!-- Form add product -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Adicionar Produto</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>
		
  <form class="form-signin">
  
  <div class="form-group">
    <label for="txtLogin" class="text-white h5">Imagem do produto | Sobrenome:</label>
      <div class="row">
      <div class="col">
        <img src="<?php echo e(asset('img/icons/defaultProductIcon.png')); ?>" width="200px" height="200px"/>
	  </div>
      <div class="col">
       <label for="inputFileForm" class="btn btn-light font-weight-bold btn-block">Selecionar arquivo</label>
       <input type="file" class="form-control-file" style="display:none;" id="inputFileForm">
       <span id="fileName" style="display:none;"></span>
       <input id="srcFileText" class="form-control font-weight-bold" type="text" placeholder="Selecione o arquivo..." style="background-color: white;font-size:large;" readonly>
  
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
    <label for="txtPassword" class="text-white h5">Senha:</label>
    <input type="password" class="form-control" id="txtPassword" placeholder="Digite a senha de acesso...">
      </br>
	  <label for="txtPassword" class="text-white h5">Nivel da senha:</label> 
	   <div class="progress">
        <div class="progress-bar bg-danger text-white" role="progressbar" id="passParameter" style="font-size: large;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
       </div>
  </div>
 
 <button type="submit" class="btn btn-light btn-block">Cadastrar</button>

    </form>	

	<a href="<?php echo e(route('dashboard.configuracao.usuarios')); ?>"><button class="btn btn-light btn-block">Lista de usuários</button></a>
</div>
<!-- End form add product-->

<!-- JS Script -->
<script type="text/javascript">
var $input    = document.getElementById('inputFileForm'),
     $fileName = document.getElementById('fileName');

 $input.addEventListener('change', function(){
	$fileName.textContent = document.getElementById('srcFileText').value = this.value;	
 });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/cadastro/addProdutoForm.blade.php ENDPATH**/ ?>