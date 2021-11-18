

<?php $__env->startSection('content'); ?>

<div class="container">
            <h1 class="h2">Cadastro / <a href="<?php echo e(route('dashboard.cadastro.estoque')); ?>">Logistico</a> / Formulário: Logistico</h1> 
            <hr style="border-top:3px solid #000">			
</div>

<!-- Return message from query -->
 <?php if(isset($msgSuccess)): ?>
 <div class="alert alert-success h5" role="alert">
 <?php echo e($msgSuccess); ?>

 </div>
 <?php endif; ?>

 <!-- Return message from query -->
 <?php if(isset($msgError)): ?>
 <div class="alert alert-danger h5" role="alert">
 <?php echo e($msgError); ?>

 </div>
 <?php endif; ?>
 
 <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <p class="h5"><strong>Preencha todos os campos:</strong></p>
        <ul class="h5">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
 
<!-- Estoque form -->
<div class="jumbotron bg-primary">
       
	  <form method="get" action="<?php echo e(route('dashboard.cadastro.estoque.estoqueAddForm.getProduto')); ?>">
       <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />      
		       
	 <div class="form">
	  
      <div class="col">
	  <label for="staticEmail" class="text-white h5">Pesquisar pelo codigo do produto</label>
     
	    <div id="searchInput" class="form-group">
         <input type="text" id="nameSearchOrigin" name="nomeProdutoQuery" class="form-control" placeholder="Pesquisar pelo codigo do produto..." required autofocus>
        </div>    
	 </div>
		 
     </div>
	 
	 <div class="row mx-auto">
	   <button type="submit" name="btnAction" value="nameQuery" class="btn btn-primary font-weight-bold"><img src="<?php echo e(asset('img/icons/FilterIcon.png')); ?>" width="40px" height="40px" class="imgIcons"/> Iniciar consulta</button>
	   <a href="<?php echo e(route('dashboard.cadastro.produto')); ?>" target="_blank" class="btn btn-success font-weight-bold"><img src="<?php echo e(asset('img/icons/estoqueIcons.png')); ?>" width="40px" height="40px" class="imgIcons"/> Lista de produtos</a>
     </div>
	</form>
	</br>
		<div class="container">
          <h1 class="h3 text-white">Formulário: Logistico</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>
		
		<form method="post" action="<?php echo e(route('dashboard.cadastro.estoque.estoqueAddForm.actionsList')); ?>" class="form-signin" onsubmit="return confirm('Deseja realmente executar essa açâo ?');">
   
   <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
	
    <!-- ID -->	
	<?php if(isset($dadosLogistico)): ?>	
	   <input type="hidden" id="id_codigo"  name="id" value="<?php echo e($dadosLogistico[0]->id); ?>">
       <!--<small id="txtEmail" class="form-text text-muted"> Small message </small>-->
	<?php endif; ?>
	
	  <!-- Codigo -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Codigo:</label>
        <div class="col-sm-9">
		 <?php if(isset($dadosLogistico) || isset($dadosProduto) ): ?>
		   <?php if(isset($dadosLogistico)): ?>
	       <input type="text" class="form-control" id="txtCodigo" name="codigo" value="<?php echo e($dadosLogistico[0]->codigo); ?>" placeholder="Digite o endereço..." required autofocus>
		   <?php else: ?>
		   <input type="text" class="form-control" id="txtCodigo" name="codigo" value="<?php echo e($dadosProduto[0]->codigo); ?>" placeholder="Digite o endereço..." required autofocus>
           <?php endif; ?>
		  <?php else: ?>
		  <input type="text" class="form-control" id="txtCodigo" name="codigo" placeholder="Digite o endereço..." required autofocus>
         <?php endif; ?>
        </div>
       </div>
	   
	   <!-- Nome do produto -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Nome:</label>
        <div class="col-sm-9">
		 <?php if(isset($dadosLogistico) || isset($dadosProduto) ): ?>
		   <?php if(isset($dadosLogistico)): ?>
	       <input type="text" class="form-control" id="txtNomeProduto" name="nome_produto" value="<?php echo e($dadosLogistico[0]->nome_produto); ?>" placeholder="Digite o nome do produto..." required autofocus>
	       <?php else: ?>
		   <input type="text" class="form-control" id="txtNomeProduto" name="nome_produto" value="<?php echo e($dadosProduto[0]->nome); ?>" placeholder="Digite o nome do produto..." required autofocus>
           <?php endif; ?>
		  <?php else: ?>
		  <input type="text" class="form-control" id="txtNomeProduto" name="nome_produto" placeholder="Digite o nome do produto..." required autofocus>
         <?php endif; ?>
        </div>
       </div>	
	  
	   <!-- EAN -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">EAN:</label>
        <div class="col-sm-9">
		 <?php if(isset($dadosLogistico) || isset($dadosProduto) ): ?>
		  <?php if(isset($dadosLogistico)): ?>
	      <input type="text" class="form-control" id="txtNomeProduto" name="ean" value="<?php echo e($dadosLogistico[0]->ean); ?>" placeholder="Digite o codigo de barras do produto..." required autofocus>
	      <?php else: ?>
		  <input type="text" class="form-control" id="txtNomeProduto" name="ean" value="<?php echo e($dadosProduto[0]->ean); ?>" placeholder="Digite o codigo de barras do produto..." required autofocus>
          <?php endif; ?>         
		 <?php else: ?>
		  <input type="text" class="form-control" id="txtNomeProduto" name="ean" placeholder="Digite o codigo de barras do produto..." required autofocus>
         <?php endif; ?>
        </div>
       </div>

	   <!-- Fornecedor -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Fornecedor:</label>
        <div class="col-sm-9">
		 <?php if(isset($dadosLogistico) || isset($dadosProduto)): ?>
		   <?php if(isset($dadosLogistico)): ?>  
	       <input type="text" class="form-control" id="txtFornecedor" name="fornecedor" value="<?php echo e($dadosLogistico[0]->fornecedor); ?>" placeholder="Digite o fornecedor do produto..." required autofocus>
		   <?php else: ?>
		   <input type="text" class="form-control" id="txtFornecedor" name="fornecedor" value="<?php echo e($dadosProduto[0]->fornecedor); ?>" placeholder="Digite o fornecedor do produto..." required autofocus>
           <?php endif; ?>
		  <?php else: ?>
		  <input type="text" class="form-control" id="txtFornecedor" name="fornecedor" placeholder="Digite o fornecedor do produto..." required autofocus>
         <?php endif; ?>
        </div>
       </div>	
	   
	   <!-- Sub-Especie -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Sub-Especie:</label>
        <div class="col-sm-9">
		 <select class="form-control" id="cb_localizacao" name="sub_especie"> 
          <option  value="" selected>Seleciona a Sub-Especie do produto....</option>		 
	      <?php $__currentLoopData = $dadosSubEspecie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
   	        <?php if(isset($dadosLogistico) &&  $dadosLogistico[0]->sub_especie == $item->sub_especie || isset($dadosProduto) &&  $dadosProduto[0]->sub_especie == $item->sub_especie): ?>
     	      <option value="<?php echo e($item->sub_especie); ?>" selected><?php echo e($item->sub_especie); ?></option>
		      <?php else: ?>
		      <option value="<?php echo e($item->sub_especie); ?>"><?php echo e($item->sub_especie); ?></option>  			  
              <?php endif; ?>     
		     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		 </select>	
        </div>
       </div>
	   
	   <!-- Lote -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Lote:</label>
        <div class="col-sm-9">
		 <?php if(isset($dadosLogistico)): ?>
		  <input type="text" class="form-control" id="txtLote" name="lote" value="<?php echo e($dadosLogistico[0]->lote); ?>" placeholder="Digite o lote..." required autofocus>
          <?php else: ?>
		  <input type="text" class="form-control" id="txtLote" name="lote" placeholder="Digite o lote..." required autofocus>
         <?php endif; ?>
        </div>
       </div>
	   
	   <!-- Endereço -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Endereço:</label>
        <div class="col-sm-9">
		 <select class="form-control" id="cb_localizacao" name="endereco"> 
          <option  value="" selected>Seleciona a Endereço do produto....</option>		 
	      <?php $__currentLoopData = $dadosEndereco; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
   	        <?php if(isset($dadosLogistico) &&  $dadosLogistico[0]->endereco == $item->endereco): ?>
     	      <option value="<?php echo e($item->endereco); ?>" selected><?php echo e($item->endereco); ?></option>
		      <?php else: ?>
		      <option value="<?php echo e($item->endereco); ?>"><?php echo e($item->endereco); ?></option>  			  
              <?php endif; ?>     
		     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		 </select>	
        </div>
       </div>
	   
	   <!-- Tipo do endereço -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Tipo Endereço:</label>
        <div class="col-sm-9">
		 <?php if(isset($dadosLogistico)): ?>
		  <input type="text" class="form-control" id="txtLote" name="tipo_endereco" value="<?php echo e($dadosLogistico[0]->tipo_endereco); ?>" placeholder="Digite o Tipo do Endereço..." required autofocus>
          <?php else: ?>
		  <input type="text" class="form-control" id="txtLote" name="tipo_endereco" placeholder="Digite o Tipo do Endereço..." required autofocus>
         <?php endif; ?>
        </div>
       </div>
  </br>
  <!-- Actions buttons -->
  <?php if(!isset($dadosLogistico)): ?>
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="<?php echo e(asset('img\icons\addIcon.png')); ?>"></img>Cadastrar</button>
 <?php else: ?>
 </br><button type="submit" name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="<?php echo e(asset('img\icons\editIcon.png')); ?>" width="40px" height="40px"></img>Editar</button>
 </br><button type="submit" name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="<?php echo e(asset('img\icons\removeIcon.png')); ?>" width="40px" height="40px"></img>Remover</button>
 <?php endif; ?>
 </br><a href="<?php echo e(route('dashboard.cadastro.estoque')); ?>" class="btn btn-light btn-block" style="font-size:x-large;"><img src="<?php echo e(asset('img\icons\leftArrowIcon.png')); ?>" width="40px" height="40px"></img>Lista da Logistica</a> 		
 
 </form>

  </div><!-- Termina estoque -->
  </br>
  
 
 </form>
</div><!-- Termina lista do estoque -->



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