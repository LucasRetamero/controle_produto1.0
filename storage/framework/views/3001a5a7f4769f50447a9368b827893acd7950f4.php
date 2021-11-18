

<?php $__env->startSection('title','Controle de produto - Dashboard / Formulário: Produto'); ?>

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
            <h1 class="h2">Cadastro / <a href="<?php echo e(route('dashboard.cadastro.produto')); ?>">Produto</a> / Formulário: Produto</h1> 
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
          <h1 class="h3 text-white">Formulário: Produto</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>

   <form class="form-signin" method="post" action="<?php echo e(route('dashboard.cadastro.produto.productAddForm.action')); ?>" onsubmit="return confirm('Deseja realmente executar essa açâo ?');">
    
		<input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
		
		<!-- Photo 
	    <div class="form-group mx-auto" style="width: 200px;">
         <label for="txtLogin" class="h5">Imagem do produto</label>
	     <img src="<?php echo e(asset('img/icons/defaultProductIcon.png')); ?>" width="200px" height="200px" id="imgProdutoShow"/>
         <small id="txtEmail" class="form-text text-muted"> Small text</small>
	     <label for="inputFileForm" class="btn btn-primary font-weight-bold btn-block">Selecionar foto</label>
         <input type="file" class="form-control-file" style="display:none;" id="inputFileForm">
         <span id="fileName" style="display:none;"></span>
         <input id="srcFileText" class="form-control font-weight-bold" type="text" placeholder="Selecione o arquivo..." style="background-color: white;font-size:large;" readonly>
         <input type="hidden" name="img" id="imgProduto" value=" " />
		</div>-->
		
 
		<!-- Code -->
        <?php if(isset($dadosProduto)): ?>
 	     <input  type="hidden"  id="id_codigo" name="id" value="<?php echo e($dadosProduto[0]->id); ?>" />		
		<?php endif; ?>
		
	   <!-- Codigo -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Codigo:</label>
        <div class="col-sm-9">
		 <?php if(isset($dadosProduto)): ?>
		  <input type="text" class="form-control" id="txtCodigo" name="codigo" value="<?php echo e($dadosProduto[0]->codigo); ?>" placeholder="Digite o Codigo do produto..." required autofocus>
          <?php else: ?>
		  <input type="text" class="form-control" id="txtCodigo" name="codigo" placeholder="Digite o Codigo do produto..." required autofocus>
         <?php endif; ?>
        </div>
       </div>
	   
	   <!-- Nome -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Nome:</label>
        <div class="col-sm-9">
		 <?php if(isset($dadosProduto)): ?>
		  <input type="text" class="form-control" id="txtNome" name="nome" value="<?php echo e($dadosProduto[0]->nome); ?>" placeholder="Digite o nome do produto..." required autofocus>
          <?php else: ?>
		  <input type="text" class="form-control" id="txtNome" name="nome" placeholder="Digite o nome do produto..." required autofocus>
         <?php endif; ?>
        </div>
       </div>
	   
	   <!-- EAN -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">EAN:</label>
        <div class="col-sm-9">
		 <?php if(isset($dadosProduto)): ?>
		  <input type="text" class="form-control" id="txtEAN" name="ean" value="<?php echo e($dadosProduto[0]->ean); ?>" placeholder="Digite o codigo de barras do produto..." required autofocus>
          <?php else: ?>
		  <input type="text" class="form-control" id="txtEAN" name="ean" placeholder="Digite o codigo de barras do produto..." required autofocus>
         <?php endif; ?>
        </div>
       </div>
	   
	   <!-- Fornecedor -->
	   <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 text-white h4">Fornecedor:</label>
        <div class="col-sm-9">
		 <?php if(isset($dadosProduto)): ?>
		   <input type="text" class="form-control" id="txtFornecedor" name="fornecedor" value="<?php echo e($dadosProduto[0]->fornecedor); ?>" placeholder="Digite o fornecedor do produto..." required autofocus>
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
          <option  value="default" selected>Seleciona a Sub-Especie do produto....</option>		 
	      <?php $__currentLoopData = $dadosSubEspecie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
   	        <?php if(isset($dadosProduto) &&  $dadosProduto[0]->sub_especie == $item->sub_especie): ?>
     	      <option value="<?php echo e($item->sub_especie); ?>" selected><?php echo e($item->sub_especie); ?></option>
		      <?php else: ?>
		      <option value="<?php echo e($item->sub_especie); ?>"><?php echo e($item->sub_especie); ?></option>  			  
              <?php endif; ?>     
		     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		 </select>	
        </div>
       </div>
 		 		 	
		</br>
	  
  </br>
  <!-- Actions buttons -->
  <?php if(!isset($dadosProduto)): ?>
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="<?php echo e(asset('img\icons\addIcon.png')); ?>"></img>Cadastrar</button>
 <?php else: ?>
 </br><button type="submit" name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="<?php echo e(asset('img\icons\editIcon.png')); ?>" width="40px" height="40px"></img>Editar</button>
 </br><button type="submit" name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="<?php echo e(asset('img\icons\removeIcon.png')); ?>" width="40px" height="40px"></img>Remover</button>
 <?php endif; ?>
 </br><a href="<?php echo e(route('dashboard.cadastro.produto')); ?>" class="btn btn-light btn-block" style="font-size:x-large;"><img src="<?php echo e(asset('img\icons\leftArrowIcon.png')); ?>" width="40px" height="40px"></img>Lista de Produtos</a>
  	
 </form>
</div>

 		


<!-- JS Script -->
<script type="text/javascript">
//var $input    = document.getElementById('inputFileForm'),
//     $fileName = document.getElementById('fileName');

 //$input.addEventListener('change', function(){
//	$fileName.textContent = document.getElementById('srcFileText').value = this.value;	
//	document.getElementById('imgProduto').value = $fileName.textContent;
 //});
function updateDiv(div) {
    var div = '#' + div;
    $(div).load(window.location.href + " " + div);
}
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/cadastro/produto/produtoForm.blade.php ENDPATH**/ ?>