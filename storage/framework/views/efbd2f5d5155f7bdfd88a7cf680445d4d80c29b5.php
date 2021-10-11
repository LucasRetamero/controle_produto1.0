

<?php $__env->startSection('content'); ?>
<!-- CSS from page -->
<style type="text/css">
thead{
	background-color: #6095EB;
	color: #FFF;
	font-size: large;
}

td{
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
    <h1 class="h2">Cadastro / Produto</h1> 
    <hr style="border-top:3px solid #000">	
</div>

<!-- buttons actions -->
<div id="container">
  <div class="row">  
     <div class="col-sm-12 text-center">
      <h1 class="h3">Menu</h1>
       <a href="<?php echo e(route('dashboard.cadastro.produto.productAddForm')); ?>"><button id="btnAddProduct" class="btn btn-success font-weight-bold text-white"><img src="<?php echo e(asset('img/icons/addIcon.png')); ?>" class="imgIcons"/> Adicionar novo</button></a>
       <button id="btnQueryUser" class="btn btn-primary font-weight-bold text-white" onClick="hiddenOrShowQuerUser()"><img src="<?php echo e(asset('img/icons/FilterIcon.png')); ?>" class="imgIcons"/> Consultar</button>
     </div>
  </div>
</div>

</br>
<!-- Filter user List -->
<div id="containerQuery" class="hiddenDiv">
  <div class="row">  
         <div class="col-sm-12 text-center">
          <h1 class="h3">Consultar lista de produto</h1>
     <form method="post" action="<?php echo e(route('dashboard.cadastro.produto.searching')); ?>">
      <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />      
		  
	  <div class="form-row">
	  
      <div class="col">
	    <div id="searchInput" class="form-group">
         <input type="text" id="nameSearchOrigin" name="name" class="form-control" placeholder="Digite o nome do produto...">
        </div>    
	 </div>
		 
     </div>
	
	   <button type="submit" name="btnAction" value="nameQuery" class="btn btn-primary font-weight-bold"><img src="<?php echo e(asset('img/icons/FilterIcon.png')); ?>" class="imgIcons"/> Iniciar consulta</button>
       <button type="submit" name="btnAction" value="allQuery"  class="btn btn-success font-weight-bold"><img src="<?php echo e(asset('img/icons/FilterIcon.png')); ?>" class="imgIcons"/> Buscar Todos</button>
    
	</form>
         </div>
        </div>	
</div>

</br>
<!-- Table of users -->
<table class="table">
  <h1 class="h3 text-center">Lista de Produtos</h1>
  <thead class="thead">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ean</th>
      <th scope="col">Nome</th>
      <th scope="col">Data de Fabricação</th>
      <th scope="col">Data de Vencimento</th>
      <th scope="col">Qtd Atual</th>
      <th scope="col">Qtd Minima</th>
      <th scope="col">Localização</th>
      <th scope="col">Sub_Especie</th>
      <th scope="col">Menu</th>
	  
    </tr>
  </thead>
  <tbody>
	<?php if($dados->count() > 0): ?>
  <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e($item->id); ?></th>
      <td><?php echo e($item->ean); ?></td>
      <td><?php echo e($item->nome); ?></td>
      <td><?php echo e($item->data_fabricacao); ?></td>
      <td><?php echo e($item->data_vencimento); ?></td>
      <td><?php echo e($item->quant_atual); ?></td>
      <td><?php echo e($item->quant_minimo); ?></td>
      <td><?php echo e($item->localizacao); ?></td>
      <td><?php echo e($item->sub_especie); ?></td>
      <td>
	    <div class="row"> <!-- buttons edit /  remove--> 
		 <div class="col-sm-12 text-center">
        <a href="<?php echo e(route('dashboard.cadastro.produto.productAddForm.edit', $item->id)); ?>"><button id="btnUpdate" class="btn btn-warning btn-md center-block" name="btnAction" value="btnEdit"><img src="<?php echo e(asset('img/icons/editIcon.png')); ?>" class="imgIcons"/> Editar</button></a>
        <a href="<?php echo e(route('dashboard.cadastro.produto.productAddForm.remove', $item->id)); ?>" onclick="return confirm('Deseja realmente remover esse item ?')"><button id="btnUpdate" class="btn btn-danger btn-md center-block" name="btnAction" value="btnRemove"><img src="<?php echo e(asset('img/icons/removeIcon.png')); ?>" class="imgIcons" value="<?php echo e($item->id); ?>"/> Remover</button></a>
         </div>
        </div> <!-- End buttons edit /  remove-->
	  </td>
    </tr>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php else: ?>
   <div class="alert alert-danger" role="alert">
    Nenhum item encontrado !
   </div>
   <?php endif; ?>
	
  </tbody>
</table>


<!-- JS from page -->
<script type="text/javascript">
// List of text component -------
var txtComponentList = ["idNomeSearch",
                        "idSobreNomeSearch",
						"idEmailSearch",
						"idLoginSearch"]; 

// Options of the Select list ------
var nivelAcessoOptions = ["Administração", 
                          "Gerência", 
						  "Produção"];

// Select configuration -----------
var nivelAcessoSelectList = document.createElement('select');
    nivelAcessoSelectList.id = "nivelAcessoSearch";;
	nivelAcessoSelectList.name = "nivelAcessoQuery";
	nivelAcessoSelectList.className = "form-control";

// Text form configuration-------
var formTextMethod = document.createElement("INPUT");
    formTextMethod.setAttribute("type","text");
	formTextMethod.className = "form-control";

// Get select component-------
var select = document.getElementById('slctQuery');

// Execute when select an option from search
select.addEventListener('change', function(){
	verifyTheCase();
});

// Verify the option selected to create element 
function verifyTheCase(){
	switch(select.value){
	  case "Nome":
      createFormTextMethod("idNomeSearch", "nomeSearch", "Digite o nome do usuario..");
	  break;
      case "Sobrenome":
      createFormTextMethod("idSobreNomeSearch", "sobreNomeSearch", "Digite o sobrenome do usuario..");
	  break;
      case "Email":
      createFormTextMethod("idEmailSearch", "emailSearch", "Digite o email do usuario..");
	  break;
      case "Login":
      createFormTextMethod("idLoginSearch", "loginSearch", "Digite o login do usuario..");
	  break;
      case "Nivel de acesso":
      createSelectMethod();
	  break;  	  
	}
}

// Set configuration to create element
function createFormTextMethod(idInput,nameInput, placeHolInput){
	formTextMethod.id = idInput;
	formTextMethod.name = nameInput;
    formTextMethod.placeholder = placeHolInput;
	
	if(document.getElementById("nameSearchOrigin")){
     	document.body.querySelector("#searchInput").removeChild(document.getElementById("nameSearchOrigin"));
		verifyTheCase();
      }else if(document.getElementById("nivelAcessoSearch")){
		document.body.querySelector("#searchInput") .removeChild(document.getElementById("nivelAcessoSearch")); 
        verifyTheCase();	 
 	 }else{ 
	   document.body.querySelector("#searchInput").appendChild(formTextMethod);	
	  }
}

//Clear other elements before create list
function clearOtherElement(){
   if(document.getElementById("nameSearchOrigin")){
	document.body.querySelector("#searchInput").removeChild(document.getElementById("nameSearchOrigin"));
	}else{	
	for(var x=0; x < txtComponentList.length; x++){
      if(document.getElementById(txtComponentList[x]))
      document.body.querySelector("#searchInput").removeChild(document.getElementById(txtComponentList[x]));		  
	 }
	}	
}

// Add option and configuration of the select
function createSelectMethod(){
	
	clearOtherElement();
	
	if(nivelAcessoSelectList.length > 0){
	clearListBeforeAdd();	
	addOptionListSearch();
	}else{
	addOptionListSearch();
	}
	
	document.body.querySelector("#searchInput").appendChild(nivelAcessoSelectList);		
}

//Add option on the list
function addOptionListSearch(){
    for(var o=0; o < nivelAcessoOptions.length; o++){
	  var option = document.createElement("option");
          option.value = nivelAcessoOptions[o];
          option.text  = nivelAcessoOptions[o];
        nivelAcessoSelectList.appendChild(option);      		  
	}	
}

//Clear List
function clearListBeforeAdd(){
	for(var p = nivelAcessoSelectList.length-1; p >= 0; p--){
	 nivelAcessoSelectList.options[p] = null;	
	}
}

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
<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/cadastro/produto/produto.blade.php ENDPATH**/ ?>