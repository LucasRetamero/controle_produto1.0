

<?php $__env->startSection('content'); ?>
<!-- CSS from user dashboard -->
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
  <h1 class="h3">Configuração / Usuários</h1>
  <hr style="border-top:3px solid #000">
</div>
	
<!-- buttons actions -->
<div id="container">
  <div class="row">  
         <div class="col-sm-12 text-center">
          <h1 class="h3">Menu</h1>
     	  <a href="<?php echo e(route('dashboard.configuracao.usuarios.userFormAdd')); ?>"><button id="btnAddUser" class="btn btn-success font-weight-bold text-white"><img src="<?php echo e(asset('img/icons/userAddIcon.png')); ?>" class="imgIcons"/> Adicionar novo</button></a>
          <button id="btnQueryUser" class="btn btn-primary font-weight-bold text-white" onClick="hiddenOrShowQuerUser()"><img src="<?php echo e(asset('img/icons/FilterIcon.png')); ?>" class="imgIcons"/> Consultar</button>
         </div>
        </div>
</div>

</br>
<!-- Filter user List -->
<div id="containerQuery" class="hiddenDiv">
  <div class="row">  
         <div class="col-sm-12 text-center">
          <h1 class="h3">Consultar lista de usuários</h1>
     <form method="get" action="<?php echo e(route('login.consultaUsuario')); ?>">
      <div class="form-row">
	  
        <div class="col2">
         <div class="form-group">
          <select class="form-control" id="slctQuery" name="cbQuery">
           <option value="Nome" selected>Nome</option>
           <option value="Sobrenome">Sobrenome</option>
           <option value="Email">Email</option>
	       <option value="Login">Login</option>
           <option value="Nivel de acesso">Nivel de acesso</option>
         </select>
         </div>
        </div>
	
      <div class="col">
	    <div id="searchInput" class="form-group">
         <input type="text" id="nameSearchOrigin" name="textSearch" class="form-control" placeholder="Digite o nome do usuârio...">
        </div>    
	 </div>
		 
     </div>
	
	   <button type="submit" class="btn btn-primary font-weight-bold"><img src="<?php echo e(asset('img/icons/FilterIcon.png')); ?>" class="imgIcons"/> Iniciar consulta</button>
	   <a href="<?php echo e(route('dashboard.configuracao.usuarios')); ?>"><button type="button" class="btn btn-primary font-weight-bold"><img src="<?php echo e(asset('img/icons/userAddIcon.png')); ?>" class="imgIcons"/> Buscar todos</button></a>
    
	</form>
         </div>
        </div>	
</div>

</br>
<!-- Table of users -->
<table class="table">
  <h1 class="h3 text-center">Lista de Usuários</h1>
  <thead class="thead">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Email</th>
      <th scope="col">Login</th>
      <th scope="col">Nivel de Acesso</th>
      <th scope="col">Menu</th>
	  
    </tr>
  </thead>
  <tbody>
  <?php if($dadosUsuarios->count() > 0): ?>
  <?php $__currentLoopData = $dadosUsuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e($item->id); ?></th>
      <td><?php echo e($item->nome); ?></td>
      <td><?php echo e($item->sobrenome); ?></td>
      <td><?php echo e($item->email); ?></td>
      <td><?php echo e($item->login); ?></td>
      <td><?php echo e($item->nivelAcesso); ?></td>
      <td>
	    <div class="row"> <!-- buttons edit /  remove--> 
		 <div class="col-sm-12 text-center">
          <a href="<?php echo e(route('login.editarFormulario', $item->id)); ?>"><button id="btnUpdate" class="btn btn-primary btn-md center-block" name="btnAction"><img src="<?php echo e(asset('img/icons/editIcon.png')); ?>" class="imgIcons" value="<?php echo e($item->id); ?>"/> Editar</button></a>
         </div>
        </div> <!-- End buttons edit /  remove-->
	  </td>
    </tr>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php else: ?>
   <div class="alert alert-danger" role="alert">
    Nenhum usuário encontrado !
   </div>
   <?php endif; ?>
	
  </tbody>
</table>

<!-- JS Script -->
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
<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/configuration/usuario/usuario.blade.php ENDPATH**/ ?>