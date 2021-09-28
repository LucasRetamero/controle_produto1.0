<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    
	<!-- Title from page -->
    <title>Controle de Produto</title>
	
	<!-- CSS from page -->
	<style type="text/css">
	html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
	</style>
  </head>
  <body class="bg-primary text-center">
    <form method="post" action="<?php echo e(route('login.logar')); ?>"class="form-signin bg-light">
	<input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
      <img class="mb-4" src="<?php echo e(asset('img/icons/product.png')); ?>" alt="" width="72" height="72">   
   	 <h1 class="h3 mb-3 font-weight-normal">Controle de Produto</h1>
      <label for="inputLogin" class="sr-only">Digite o login...</label>
      <input type="email" id="inputLogin" name="email" class="form-control" placeholder="Digite o email..." required autofocus>
      <label for="inputPassword" class="sr-only">Digite a senha...</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Digite a senha..." required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
      <p class="mt-5 mb-3 text-muted font-weight-bold">&copy; 2021</p>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo e(asset('js/jquery-3.3.1.slim.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
  </body>
</html><?php /**PATH J:\Projects\Controle de Produto\controle_produto\resources\views/login/index.blade.php ENDPATH**/ ?>