<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    
	<!-- Title from page -->
    <title>Fazendo Logistica</title>
	
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
    <form method="post" action="{{ route('login.logar') }}"class="form-signin bg-light">
	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
      <img class="mb-4" src="{{ asset('img/icons/product.png') }}" alt="" width="72" height="72">   
   	 <h1 class="h3 mb-3 font-weight-normal">Fazendo Logistica</h1>
      <label for="inputLogin" class="sr-only">Digite o login...</label>
      <input type="email" id="inputLogin" name="email" class="form-control" placeholder="Digite o email..." required autofocus>
      <label for="inputPassword" class="sr-only">Digite a senha...</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Digite a senha..." required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
	  </br>
	  @if(isset($errorMsg))
	  <div class="alert alert-danger" role="alert">
       <b>{{ $errorMsg }}</b>
       </div>
	  @endif
      <p class="mt-5 mb-3 text-muted font-weight-bold">&copy; 2021</p>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>