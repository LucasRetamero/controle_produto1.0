

<?php $__env->startSection('title','Controle de produto - Dashboard / Formulário: Endereço'); ?>

<?php $__env->startSection('content'); ?>
<!-- CSS -->
<style type="text/css">
.imgIcons{
 width: 30px;
 height: 30px;
}
#fixedButtom {
 position: fixed;
 bottom: 0;
 top: 0; 
}

.roundedFixedBtn{
          height: 60px;
          line-height: 80px;  
          width: 60px;  
          font-size: 2em;
          font-weight: bold;
          border-radius: 50%;
          background-color: #4CAF50;
          color: white;
          text-align: center;
          cursor: pointer;
}


thead{
	background-color: #FFF;
	color: #000;
	font-size: large;
}
th,td{ 
 font-size:large;	
}
td{
  background-color: #FFF;
  color: #000;
}

</style>

<div class="container" id="topPage">
            <h1 class="h2">Cadastro / <a href="<?php echo e(route('dashboard.cadastro.endereco')); ?>">Endereço</a> / Formulário: Endereço</h1> 
            <hr style="border-top:3px solid #000">			
</div>
 
 <!-- Return message from query -->
 <?php if(isset($msgSuccess)): ?>
 <div class="alert alert-success h5" role="alert">
 <?php echo e($msgSuccess); ?>

 </div>
 <?php endif; ?>
 

<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Formulário: Endereço</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>

   <form method="post" action="<?php echo e(route('dashboard.cadastro.endereco.enderecoForm.actionsMenu')); ?>" class="form-signin" onsubmit="return confirm('Deseja realmente executar essa açâo ?');">
   
   <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
	
    <!-- Codigo -->	
	<?php if(isset($dadosEndereco)): ?>	
	   <input type="hidden" id="id_codigo"  name="id" value="<?php echo e($dadosEndereco[0]->id); ?>">
       <!--<small id="txtEmail" class="form-text text-muted"> Small message </small>-->
	<?php endif; ?>
	
	<!-- Endereço -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Endereço:</label>
        <div class="col-sm-9">
		 <?php if(isset($dadosEndereco)): ?>
		  <input type="text" class="form-control" id="txtEndereco" name="endereco" value="<?php echo e($dadosEndereco[0]->endereco); ?>" placeholder="Digite o endereço..." required autofocus>
          <?php else: ?>
		  <input type="text" class="form-control" id="txtEndereco" name="endereco" placeholder="Digite o endereço..." required autofocus>
         <?php endif; ?>
        </div>
       </div>	
  </br>
  <!-- Actions buttons -->
  <?php if(!isset($dadosEndereco)): ?>
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="<?php echo e(asset('img\icons\addIcon.png')); ?>"></img>Cadastrar</button>
 <?php else: ?>
 </br><button type="submit" name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="<?php echo e(asset('img\icons\editIcon.png')); ?>" width="40px" height="40px"></img>Editar</button>
 </br><button type="submit" name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="<?php echo e(asset('img\icons\removeIcon.png')); ?>" width="40px" height="40px"></img>Remover</button>
 <?php endif; ?>
 </br><a href="<?php echo e(route('dashboard.cadastro.endereco')); ?>" class="btn btn-light btn-block" style="font-size:x-large;"><img src="<?php echo e(asset('img\icons\leftArrowIcon.png')); ?>" width="40px" height="40px"></img>Lista de Endereço</a>
  		
 
 </form>
</div>
		
 	
</div>
</div>
  
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>

<!-- JS Script -->
<script type="text/javascript">

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/cadastro/endereco/enderecoForm.blade.php ENDPATH**/ ?>