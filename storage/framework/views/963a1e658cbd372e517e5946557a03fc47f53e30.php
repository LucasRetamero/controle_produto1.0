

<?php $__env->startSection('title','Controle de produto - Dashboard / formulário: Sub Especie'); ?>

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
            <h1 class="h2">Cadastro / <a href="<?php echo e(route('dashboard.cadastro.subEspecie')); ?>">Sub Especie</a> / Formulário: Sub Especie</h1> 
            <hr style="border-top:3px solid #000">			
</div>
 
<!-- Product form -->
<div class="jumbotron bg-primary">
        
		<div class="container">
          <h1 class="h3 text-white">Formulário: Sub Especie</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>

   <form method="post" action="<?php echo e(route('dashboard.cadastro.actions')); ?>" class="form-signin">
   
   <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
		
	<?php if(isset($dadosSubEspecie)): ?>	
    <!-- Codigo -->
     <div class="form-group">
       <label for="cbNivelAcesso" class="text-white h5">Codigo</label>
	   <input type="text" class="form-control" id="id"  name="id" value="<?php echo e($dadosSubEspecie[0]->id); ?>" placeholder="Codigo da Sub Especie....." required>
       <small id="txtEmail" class="form-text text-muted"><!-- Small message --></small>
	  </div>
	<?php endif; ?>
    
	<!-- Tipo do endereço --> 
		<div class="form-group">
         <label for="cbNivelAcesso" class="text-white h5">Sub Especie</label> 
      <?php if(isset($dadosSubEspecie)): ?>        
		<input type="text" class="form-control" id="sub_especie"  name="sub_especie" value="<?php echo e($dadosSubEspecie[0]->sub_especie); ?>" placeholder="Digite a Sub Especie..." required>
	  <?php else: ?>	
		<input type="text" class="form-control" id="sub_especie"  name="sub_especie" placeholder="Digite a Sub Especie..." required>
       <?php endif; ?>      
	  <small id="txtEmail" class="form-text text-muted"><!-- Small message --></small>		 
		 </div>
		
  </br>
  <!-- Actions buttons -->
  <?php if(!isset($dadosSubEspecie)): ?>
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="<?php echo e(asset('img\icons\addIcon.png')); ?>"></img>Cadastrar</button>
 <?php endif; ?>
 </br><button name="btnAction" onclick="updateDiv('attLocalizacao')" class="btn btn-light btn-block" style="font-size:x-large;" value="btnRefresh"><img src="<?php echo e(asset('img\icons\reloadIcon.png')); ?>" width="40px" height="40px"></img>Atualizar</button>
 <?php if(isset($dadosSubEspecie)): ?>
 </br><button type="submit" name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="<?php echo e(asset('img\icons\editIcon.png')); ?>" width="40px" height="40px"></img>Editar</button>
 </br><button type="submit" name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="<?php echo e(asset('img\icons\removeIcon.png')); ?>" width="40px" height="40px"></img>Remover</button>
 <?php endif; ?>
 </br><button type="submit" name="btnAction" class="btn btn-light btn-block" style="font-size:x-large;" value="btnCancel"><img src="<?php echo e(asset('img\icons\NoIcon.png')); ?>" width="40px" height="40px"></img>Cancelar</button>
  	
 
 </form>
</div><!-- Termina lista do estoque -->
		
 	
</div>
</div>
  
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>

<!-- JS Script -->
<script type="text/javascript">

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/cadastro/subEspecie/subEspecieForm.blade.php ENDPATH**/ ?>