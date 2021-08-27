
<!-- Configuração dashboard -->

<!-- CSS from configution dashboard -->
<style type="text/css">
input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  padding: 10px;
}

/* configuration of the label*/
.confLabel{
 padding-left: 10px;
 font-size: large;
}

.confHr{
  border-top:3px solid #FFF;
}

</style>
<!-- End CSS from configuration dashboard -->

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Configuração</h1>        
</div>

<!-- Form from backup -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Exportação</h1>
		  <hr class="confHr">
        </div>
		
  <form class="form-signin">
	<label class="d-block h5 text-white">Selecione as opções desejada para fazer a exportação</label>
  
  <div class="form-check">
   <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">  
   <label class="form-check-label confLabel text-white" for="flexCheckDefault">
   Produto
   </label>
  </div>
  
  <div class="form-check">
   <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
   <label class="form-check-label confLabel text-white" for="flexCheckChecked">
    Endereçamento
   </label>
  </div>
  
  <div class="form-check">
   <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
   <label class="form-check-label confLabel text-white" for="flexCheckChecked">
    Rota do endereçamento
   </label>
  </div>
  
  <div class="form-check">
   <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
   <label class="form-check-label confLabel text-white" for="flexCheckChecked">
   Todos
   </label>
  </div>
  
  </br>
  <input type="button" class="form-control-file btn-light btn-lg btn-block" id="inputWayFileBackup" value="Realizar Exportação" onClick="document.getElementById('inputWayFileBackup').click()">
		
    </form>	
	
</div>
<!-- End from backup -->

<!-- Form from recovery -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Importação</h1>
		  <hr class="confHr">
        </div>
		
  <form class="form-signin">
   <label class="d-block h5 text-white">Selecione o arquivo para importar</label>
  
  <label for="inputFileForm" class="btn btn-light font-weight-bold btn-block">Selecionar arquivo</label>
  <input type="file" class="form-control-file" style="display:none;" id="inputFileForm">
  <span id="fileName" style="display:none;"></span>
  <input id="srcFileText" class="form-control font-weight-bold" type="text" placeholder="Selecione o arquivo..." style="background-color: white;font-size:large;" readonly>
  </br>
  <input type="button" class="form-control-file btn-light btn-lg btn-block" id="inputWayFileBackup" value="Realizar Importação">
  	
    </form>	
	
</div>
<!-- End from recovery -->

<!-- manager user -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Gerenciar Usuários</h1>
		  <hr class="confHr">
        </div>
		
  <form class="form-signin">
   <a href="<?php echo e(route('dashboard.configuracao.userFormAdd')); ?>"><button type="button" class="btn btn-light btn-block" id="addUser">Adicionar Usuário</button></a>
   </br>
   <button type="button" class="btn btn-light btn-block" id="addUser">Tabela de Usuários</button>
  </form>	
	
</div>
<!-- End manager user -->


<!-- Script configuration dashboard -->
<script type="text/javascript">
 var $input    = document.getElementById('inputFileForm'),
     $fileName = document.getElementById('fileName');

 $input.addEventListener('change', function(){
	$fileName.textContent = document.getElementById('srcFileText').value = this.value;	
 });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/configuracao.blade.php ENDPATH**/ ?>