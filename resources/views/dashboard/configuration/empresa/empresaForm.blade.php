@extends('dashboard.default')

@section('title', 'Dashboard / Formulário: Empresa')

@section('content')

<!-- CSS from user form dashboard -->
<style type="text/css">
.confHr{
  border-top:3px solid #FFF;
}

thead{
	background-color: #6095EB;
	color: #FFF;
	font-size: large;
}
th,td{
 font-size:large;
}

.hiddenComp{
 display: none;
}

.showComp{
 display: block;
}

.invalid-feedback {
    font-weight: bold;
    color: #FFF;
    font-size: 15px;
}
</style>


<div class="container">
            <h1 class="h2">Configuração / <a href="{{ route('dashboard.configuracao.empresa') }}">Empresa</a> / Formulário: Empresa</h1>
            <hr style="border-top:3px solid #000">
</div>

@if(isset($errorMessage))
 <div class="alert alert-danger h5" role="alert">
 {{ $errorMessage }}
 </div>
 @endif

<!-- Form add login -->
<div class="jumbotron bg-primary">

		<div class="container">
		 <h1 class="h3 text-white">Formulário: Empresa</h1>
		 <hr class="confHr">
        </div>

  <form method="post"  id="empresaForm" class="form-signin needs-validation" action="{{ route('dashboard.configuracao.empresa.editarFormulario') }}" novalidate>
  <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

    <div class="form-group row">
        <label for="txtRazaoSocial" class="col-sm-2 text-white h5">Razão Social:</label>
        <div class="col-sm-9">
            @if(isset($dataEmpresa))
            <input type="hidden" name="id" value="{{ $dataEmpresa[0]->id }}"/>
            <input type="text" class="form-control" id="txtRazaoSocial" name="razao_social"  placeholder="Digite a razão social" value="{{ $dataEmpresa[0]->razao_social }}" required>
            @else
            <input type="text" class="form-control" id="txtRazaoSocial" name="razao_social"  placeholder="Digite a razão social" value="" required>
            @endif
            <div class="invalid-feedback">
                Campo Razão Social vazio !
            </div>
        </div>
        </div>

        <div class="form-group row">
            <label for="txtFantasia" class="col-sm-2 text-white h5">Fantasia:</label>
            <div class="col-sm-9">
                @if(isset($dataEmpresa))
                <input type="text" class="form-control" id="txtFantasia" name="fantasia"  placeholder="Digite a fantasia" value="{{ $dataEmpresa[0]->fantasia }}" required autofocus>
                @else
                <input type="text" class="form-control" id="txtFantasia" name="fantasia"  placeholder="Digite a fantasia" value="" required autofocus>
                @endif
                <div class="invalid-feedback">
                    Campo Fantasia vazio !
                </div>
             </div>
            </div>

            <div class="form-group row">
                <label for="txtCnpj" class="col-sm-2 text-white h5">CNPJ:</label>
                <div class="col-sm-9">
                    @if(isset($dataEmpresa))
                    <input type="text" class="form-control" id="txtCnpj" name="cnpj"  placeholder="Digite o CNPJ" value="{{ $dataEmpresa[0]->cnpj }}" required autofocus>
                    @else
                    <input type="text" class="form-control" id="txtCnpj" name="cnpj"  placeholder="Digite o CNPJ" value="" required autofocus>
                    @endif
                    <div class="invalid-feedback">
                        Campo CNPJ vazio !
                    </div>
                 </div>
                </div>

                <div class="form-group row">
                    <label for="txtEmail" class="col-sm-2 text-white h5">Email:</label>
                    <div class="col-sm-9">
                        @if(isset($dataEmpresa))
                        <input type="email" class="form-control" id="txtEmail" name="email"  placeholder="Digite o Email" value="{{ $dataEmpresa[0]->email }}" required autofocus>
                        @else
                        <input type="email" class="form-control" id="txtEmail" name="email"  placeholder="Digite o Email" value="" required autofocus>
                        @endif
                        <div class="invalid-feedback">
                            Campo Email vazio !
                        </div>
                     </div>
                    </div>

                    <div class="form-group row">
                        <label for="txtContato" class="col-sm-2 text-white h5">Contato:</label>
                        <div class="col-sm-9">
                            @if(isset($dataEmpresa))
                            <input type="hidden" name="id" value="{{ $dataEmpresa[0]->id }}"/>
                            <input type="text" class="form-control" id="txtContato" name="contato"  placeholder="Digite o Contato" value="{{ $dataEmpresa[0]->contato }}" required autofocus>
                            @else
                            <input type="text" class="form-control" id="txtContato" name="contato"  placeholder="Digite o Contato" value="" required autofocus>
                            @endif
                            <div class="invalid-feedback">
                                Campo Contato vazio !
                            </div>
                         </div>
                        </div>
 @if(isset($dataEmpresa))
<button type="submit"  name="btnAction" class="btn btn-warning btn-block" style="font-size:x-large;" value="btnEdit"><img src="{{ asset('img\icons\editIcon.png') }}" width="40px" height="40px"></img>Editar</button>
<button type="submit"  name="btnAction" class="btn btn-danger btn-block" style="font-size:x-large;" value="btnRemove"><img src="{{ asset('img\icons\removeIcon.png') }}" width="40px" height="40px"></img>Remover</button>
</br>
<a href="{{ route('dashboard.configuracao.empresa') }}"><button type="button"  class="btn btn-light btn-block" style="font-size:x-large;"><img src="{{ asset('img\icons\NoIcon.png') }}" width="40px" height="40px"></img>Cancelar</button></a>
 @else
 <button type="submit" name="btnAction" class="btn btn-success btn-block" style="font-size:x-large;" value="btnAdd"><img src="{{ asset('img\icons\addIcon.png') }}"></img>Cadastrar</button>
 </br>
 <a href="{{ route('dashboard.configuracao.empresa') }}"><button type="button"  class="btn btn-light btn-block" style="font-size:x-large;"><img src="{{ asset('img\icons\NoIcon.png') }}" width="40px" height="40px"></img>Cancelar</button></a>
 @endif
	</form>
</div>
<!-- End business form-->

<!-- JS Script -->
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
<!-- End JS Script-->
@endsection('content')
