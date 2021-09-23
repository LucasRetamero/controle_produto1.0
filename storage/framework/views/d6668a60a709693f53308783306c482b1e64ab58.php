

<?php $__env->startSection('content'); ?>
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

<div class="container">
        <h1 class="h2">Configuração / Exportação</h1>
        <hr style="border-top:3px solid #000">        
</div>

<!-- Backup -->
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
<!-- End backup -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/configuration/exportacao.blade.php ENDPATH**/ ?>