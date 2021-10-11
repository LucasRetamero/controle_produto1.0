

<?php $__env->startSection('content'); ?>

<div class="container">
            <h1 class="h2">Cadastro / <a href="<?php echo e(route('dashboard.cadastro.estoque')); ?>">Estoque</a> / Formulário do estoque</h1> 
            <hr style="border-top:3px solid #000">			
</div>

<!-- Estoque form -->
<!-- Estoque form -->
<div class="jumbotron bg-primary">
       
		<div class="container">
          <h1 class="h3 text-white">Formulário do estoque</h1>
		  <hr style="border-top:3px solid #FFF">
        </div>
	
	<!-- Lista de informações do estoque -->
	<div class="accordion" id="accordionExample">
 
  <!-- Form do estoque-->
  <form class="form-signin">

  <!-- Informações do estoque -->
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseInfoEstoque" aria-expanded="true" aria-controls="collapseInfoEstoque">
          Informações
        </button>
      </h5>
    </div>

    <div id="collapseInfoEstoque" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        
    <div class="form-group">
    
      <div class="row">
		
	 <!-- Lote -->
      <div class="col">
	   <label for="cbNivelAcesso" class="h5">Lote:
	   <button class="btn btn-light" style="font-size: large;"><img src="<?php echo e(asset('img/icons/addIcon.png')); ?>" class="imgIcons"> </img> </button>
	   </label>
 
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o lote</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	 <!-- Tipo do endereço -->
	  <div class="col">
	   <label for="cbNivelAcesso" class="h5">Tipo do endereço:
	   <button class="btn btn-light" style="font-size: large;"><img src="<?php echo e(asset('img/icons/addIcon.png')); ?>" class="imgIcons"></img> </button>
	   </label>

        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione a tipo do endereço</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	   
      </div>
	</div>
	
    <div class="form-group">
      <div class="row">
	  
      <div class="col">
	   <label for="cbNivelAcesso" class="h5">Area:
	   <button class="btn btn-light" style="font-size: large;"><img src="<?php echo e(asset('img/icons/addIcon.png')); ?>" class="imgIcons"> </img> </button>
	   </label>
	   
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione a area</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="h5">Rua:</label>
	   
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione a rua</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="h5">Predio:</label>
	   
        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o predio</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="h5">Nivel:</label>

        <select class="form-control" id="cbNivelAcesso">
         <option>Selecione o nivel</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
	  <div class="col">
	   <label for="cbNivelAcesso" class="h5">Apto:</label>
        
		<select class="form-control" id="cbNivelAcesso">
         <option>Selecione o apto</option>
         <option>Administrador</option>
         <option>Gerência</option>
         <option>Produção</option>
        </select>
      </div>
	  
      </div>
	</div>
	  
	<small id="txtName" class="form-text text-muted"><!-- Small message --></small>
  </div>
	  </div>
    </div>
  </div><!-- Termina informações do estoque -->
  
  <!-- lista  do estoque -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseListaEstoque" aria-expanded="false" aria-controls="collapseTwo">
          Lista do estoque
        </button>
      </h5>
    </div>
    <div id="collapseListaEstoque" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      	
<!-- Tabela de informações do produto -->
<table class="table">

    <div class="container">
      <h1 class="h3">Info do produto no estoque</h1>
	  <hr style="border-top:3px solid #000">
    </div>
	
   <!-- inicio do formulario -->	
   <form class="form-signin">
  
  <thead class="thead">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Produto</th>
      <th scope="col">Lote</th>
      <th scope="col">Area</th>
      <th scope="col">Rua</th>
      <th scope="col">Predio</th>
      <th scope="col">Nivel</th>
      <th scope="col">Apto</th>
      <th scope="col">Menu</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row">01</td><!-- ID do estoque -->
      <td>ZACTRAN 100ML</td> <!-- Nome do produto -->
      <td>1120</td> <!-- Lote -->
      <td>D07</td> <!-- Area -->
      <td>001</td> <!-- Rua -->
      <td>002</td> <!-- Predio -->
      <td>000</td> <!-- Nivel -->
      <td>001</td> <!-- Apto -->
      <td><div class="btn-group" role="group" aria-label="Basic example">
   
   <!-- Editar -->
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="submit" class="btn btn-warning" style="font-size: large;"><img src="<?php echo e(asset('img/icons/editIcon.png')); ?>" class="imgIcons"></img> Editar</button>
   </div>
   
   <!-- Removar -->
   <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="submit" class="btn btn-danger text-white" style="font-size: large;"><img src="<?php echo e(asset('img/icons/removeIcon.png')); ?>" class="imgIcons"></img> Remover</button>
   </div>
	
   </div>
   </td>
      
    </tr>
    	
  </tbody>
   </form> <!-- fim do formulario -->
  </table>
	  </div>
    </div>
  </div><!-- Termina estoque -->
  </br>
  
  <!-- Buttons: Add/Refresh/Edit/Remove/Cancel -->
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="<?php echo e(asset('img\icons\addIcon.png')); ?>"></img>Cadastrar</button>
 </br><button type="submit" name="btnAction" class="btn btn-light btn-block" style="font-size:x-large;" value="btnRefresh"><img src="<?php echo e(asset('img\icons\reloadIcon.png')); ?>" width="40px" height="40px"></img>Atualizar</button>
 </br><button type="submit" name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="<?php echo e(asset('img\icons\editIcon.png')); ?>" width="40px" height="40px"></img>Editar</button>
 </br><button type="submit" name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="<?php echo e(asset('img\icons\removeIcon.png')); ?>" width="40px" height="40px"></img>Remover</button>
 </br><a href="<?php echo e(route('dashboard.cadastro.produto')); ?>"><button type="submit" name="btnAction" class="btn btn-light btn-block" style="font-size:x-large;" value="btnCancel"><img src="<?php echo e(asset('img\icons\NoIcon.png')); ?>" width="40px" height="40px"></img>Cancelar</button></a>
  <!-- Actions buttons 
  <center><div class="btn-group" role="group" aria-label="Basic example">
  
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="<?php echo e(asset('img/icons/addIcon.png')); ?>" class="imgIcons"></img> Gravar estoque</button>
   </div>
   
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="<?php echo e(asset('img/icons/reloadIcon.png')); ?>" class="imgIcons"></img> Atualizar</button>
  </div>
     
   <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="<?php echo e(asset('img/icons/clearIcon.png')); ?>" class="imgIcons"></img> Limpar campos</button>
   </div>
   
   <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="<?php echo e(asset('img/icons/editIcon.png')); ?>" class="imgIcons"></img> Editar</button>
   </div>
   
   <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="submit" class="btn btn-light" style="font-size: large;"><img src="<?php echo e(asset('img/icons/removeIcon.png')); ?>" class="imgIcons"></img> Remover</button>
   </div>

  </div></center>-->
 
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