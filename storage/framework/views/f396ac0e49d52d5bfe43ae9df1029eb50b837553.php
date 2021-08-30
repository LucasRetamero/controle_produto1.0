

<?php $__env->startSection('content'); ?>
<!-- CSS from configuration dashboard -->
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
    <h1 class="h2">Configuração / Importação</h1> 
    <hr style="border-top:3px solid #000">	
</div>

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

<!-- JS Script  -->
<script type="text/javascript">
 var $input    = document.getElementById('inputFileForm'),
     $fileName = document.getElementById('fileName');

 $input.addEventListener('change', function(){
	$fileName.textContent = document.getElementById('srcFileText').value = this.value;	
 });
</script>
<!-- End JS Script -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/configuration/importacao.blade.php ENDPATH**/ ?>