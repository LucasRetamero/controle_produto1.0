

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
     <form action="#">
      <div class="form-row">
	  
        <div class="col2">
         <div class="form-group">
          <select class="form-control" id="slctQuery">
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
         <input type="text" id="nameSearchOrigin" class="form-control" placeholder="Digite o nome do usuârio...">
        </div>    
	 </div>
		 
     </div>
	
	   <button type="submit" class="btn btn-primary font-weight-bold"><img src="<?php echo e(asset('img/icons/FilterIcon.png')); ?>" class="imgIcons"/> Iniciar consulta</button>
    
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
      <th scope="col">id_User</th>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Email</th>
      <th scope="col">Login</th>
      <th scope="col">Nivel de Acesso</th>
      <th scope="col">Ações</th>
	  
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Jorge</td>
      <td>Silva</td>
      <td>jorge_silva@gmail.com</td>
      <td>JorgeSilva</td>
      <td>Administração</td>
      <td>
	    <div class="row"> <!-- buttons edit /  remove--> 
         <div class="col-sm-12 text-center">
          <button id="btnUpdate" class="btn btn-primary btn-md center-block"><img src="<?php echo e(asset('img/icons/editIicon.png')); ?>" class="imgIcons"/> Editar</button>
          <button id="btnRemove" class="btn btn-outline-danger btn-md center-block"><img src="<?php echo e(asset('img/icons/removeIcon.png')); ?>" class="imgIcons"/> Remover</button>
         </div>
        </div> <!-- End buttons edit /  remove-->
	  </td>
    </tr>
	
  </tbody>
</table>

<!-- JS Script -->
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
<?php echo $__env->make('dashboard.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/dashboard/configuration/usuario.blade.php ENDPATH**/ ?>