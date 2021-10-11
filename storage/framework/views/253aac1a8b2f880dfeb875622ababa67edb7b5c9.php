

<?php $__env->startSection('content'); ?>
<!-- CSS from page -->
<style type="text/css">
thead{
	background-color: #6095EB;
	color: #FFF;
	font-size: large;
}

td{
  font-size: large;
  font-weight: bolder;  
}

#btnUpdate,
#btnRemove{
    display: inline-block;
    vertical-align: top;
}

.imgIcons{
 width: 30px;
 height: 30px;
}

.hiddenDiv{
  display: none;
}

.showDiv{
  display: block;
}
</style>

<div class="container">
    <h1 class="h2">Cadastro / Tipo do Endereço</h1> 
    <hr style="border-top:3px solid #000">	
</div>

<!-- buttons actions -->
<div id="container">
  <div class="row">  
     <div class="col-sm-12 text-center">
      <h1 class="h3">Menu</h1>
       <a href="<?php echo e(route('dashboard.cadastro.tipo_endereco.tipoEnderecoAddForm')); ?>"><button id="btnAddProduct" class="btn btn-success font-weight-bold text-white"><img src="<?php echo e(asset('img/icons/addIcon.png')); ?>" class="imgIcons"/> Adicionar novo</button></a>
       <button id="btnQueryUser" class="btn btn-primary font-weight-bold text-white" onClick="hiddenOrShowQuerUser()"><img src="<?php echo e(asset('img/icons/FilterIcon.png')); ?>" class="imgIcons"/> Consultar</button>
     </div>
  </div>
</div>

</br>
<!-- Filter user List -->
<div id="containerQuery" class="hiddenDiv">
  <div class="row">  
         <div class="col-sm-12 text-center">
          <h1 class="h3">Consultar lista do tipo do endereço</h1>
     <form method="post" action="<?php echo e(route('dashboard.cadastro.tipo_endereco.searching')); ?>">
      <div class="form-row">
	  
        <div class="col">
         <div class="form-group">
          <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />      
		  <input type="text" class="form-control" id="txtSearchLote" name="tipo_endereco" placeholder="Digite o tipo do endereço" />
         </div>
        </div>
		
     </div>
	
	  <button type="submit" name="btnAction" value="nameQuery" class="btn btn-primary font-weight-bold"><img src="<?php echo e(asset('img/icons/FilterIcon.png')); ?>" class="imgIcons"/> Iniciar consulta</button>
      <button type="submit" name="btnAction" value="allQuery" class="btn btn-success font-weight-bold"><img src="<?php echo e(asset('img/icons/FilterIcon.png')); ?>" class="imgIcons"/> Buscar Todos</button>
    
	</form>
         </div>
        </div>	
</div>

</br>
<!-- Table of users -->
<table class="table">
  <h1 class="h3 text-center">Lista do Tipo Endereços</h1>
  <thead class="thead">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tipo_Endereco</th>
      <th scope="col">Menu</th>
	  
    </tr>
  </thead>
  <tbody>
    <?php if($dadosTipoEndereco->count() > 0): ?>
  <?php $__currentLoopData = $dadosTipoEndereco; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e($item->id); ?></th>
	  <td><?php echo e($item->tipo_endereco); ?></td>
      <td>
	    <div class="row"> <!-- buttons edit /  remove--> 
         <div class="col-sm-12 text-center">
          <a href="<?php echo e(route('dashboard.cadastro.tipo_endereco.tipo_enderecoForm.editRemove', ['id' => $item->id, 'option' => 'edit' ] )); ?>"><button id="btnUpdate" class="btn btn-warning btn-md center-block"><img src="<?php echo e(asset('img/icons/editIcon.png')); ?>" class="imgIcons"/> Editar</button></a>
          <a href="<?php echo e(route('dashboard.cadastro.tipo_endereco.tipo_enderecoForm.editRemove', ['id' => $item->id, 'option' => 'remove'] )); ?>" onclick="return confirm('Deseja realmente remover esse item ?')"><button id="btnRemove" class="btn btn-danger btn-md center-block"><img src="<?php echo e(asset('img/icons/removeIcon.png')); ?>" class="imgIcons"/> Remover</button></a>
         </div>
        </div> <!-- End buttons edit /  remove-->
	  </td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php else: ?>
   <div class="alert alert-danger" role="alert">
    Nenhuma Item encontrado !
   </div>
   <?php endif; ?>
   
  </tbody>
</table>


<!-- JS from page -->
<script type="text/javascript">
// Hidden or show div of query
function hiddenOrShowQuerUser(){
	switch(document.getElementById("containerQuery").className){
	 case "hiddenDiv":
       document.getElementById("containerQuery").classList.remove("hiddenDiv");
	   document.getElementById("containerQuery").classList.add("showDiv");
	  break;
	 case "showDiv":
	   document.getElementById("containerQuery").classList.remove("showDiv");
	   document.getElementById("containerQuery").classList.add("hiddenDiv");
	  break;
     default:
	 //Do something
	 break;
	}
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/cadastro/tipoEndereco/tipoEndereco.blade.php ENDPATH**/ ?>