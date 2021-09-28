

<?php $__env->startSection('content'); ?>

<div class="container">
            <h1 class="h2">Cadastro / <a href="<?php echo e(route('dashboard.cadastro.estoque')); ?>">Estoque</a> / Formulário do estoque</h1> 
            <hr style="border-top:3px solid #000">			
</div>

<!-- Estoque form -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Formulário do estoque</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>
		
	<form class="form-signin">
     
  <div class="form-group">
    
      <div class="row">
	  
      <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Lote:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o lote</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Tipo do endereço:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione a tipo do endereço</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	   
      </div>
	  
	<small id="txtName" class="form-text text-muted"><!-- Small message --></small>
  </div>
   
  <div class="form-group">
    
      <div class="row">
	  
      <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Area:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione a area</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Rua:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione a rua</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Predio:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o predio</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Nivel:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o nivel</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="text-white h5">Apto:</label>
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o apto</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
      </div>
	  
	<small id="txtName" class="form-text text-muted"><!-- Small message --></small>
  </div>
  
 <button type="submit" class="btn btn-light btn-block">Adicionar estoque</button>

    </form>


</div>



<!-- JS Script -->
<script type="text/javascript">
var $input    = document.getElementById('inputFileForm'),
     $fileName = document.getElementById('fileName');

 $input.addEventListener('change', function(){
	$fileName.textContent = document.getElementById('srcFileText').value = this.value;	
 });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/cadastro/estoque/estoqueForm.blade.php ENDPATH**/ ?>