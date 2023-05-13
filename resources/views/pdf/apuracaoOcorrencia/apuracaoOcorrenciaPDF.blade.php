<html>
<head>
<meta charset="UTF-8">
<title>Controle de Produto - Apuração de Ocorrência</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }

</style>

</head>
<body>

        <div align="left">
            <h1>Fazendo Logistica</h1>
            <h3>APURAÇÃO DE OCORRÊNCIA</h3>
        </div>

  <br/>

  <div class="row">
    <div class="col-md-6">
        <html>
<body>
<h1>Fazendo Logistica</h1>
<h2>APURAÇÃO DE OCORRENCIA</h2>
<hr>
  <table border="1px" width="100%">
    <thead>
      <tr>
        <th bgcolor="lightgray">CODIGO</th>
        <th bgcolor="lightgray">NOME DO PRODUTO</th>
      </tr>
    </thead>
	<tr>
	<td><center>{{ $dados[0]->codigo }}</center></td>
	<td><center>{{ $dados[0]->nome_produto }}</center></td>
	</tr>
	 <table border="1px" width="150%">
	  <thead>
	  <tr>
	   <th bgcolor="lightgray">LOTE</th>
	   <th bgcolor="lightgray">ENDERECO</th>
	   <th bgcolor="lightgray" colspan="2">QUANTIDADE SISTEMA
	    <table>
		  <tr>
		   <td><b>DISPONIVEL</b></td>
	       <td><b>RESERVADO</b></td>
		 </tr>
		 </table>
		</th>
	   <th bgcolor="lightgray" width="5%">CONTAGEM FISICA</th>
	  </tr>
	  </thead>
	  @foreach($dados as $item)
	<tr>
	<td><center>{{ $item->lote }}</center></td>
	<td><center>{{ $item->endereco }}</center></td>
	<td> </td>
	<td> </td>
	<td> </td>
	</tr>
	@endforeach
	 </table>
  </table>
   <table border="1px" width="100%">
    <thead>
     <tr><th bgcolor="lightgray">OBSERVAÇÕES E DETALHES</th></tr>
    </thead>
    <tr><td>{{ $detalhe }}</td></tr>
   </table>
  <table width="100%">
   <tr>
   <td><b>DATA:</b> {{ $dateDay }}</td>
   <td><b>ESTOQUISTA:</b> {{ $estoquista }}</td>
   <td><b>VALIDADOR:</b> {{ $validador }}</td>
   </tr>
  </table>
</body>
</html>
