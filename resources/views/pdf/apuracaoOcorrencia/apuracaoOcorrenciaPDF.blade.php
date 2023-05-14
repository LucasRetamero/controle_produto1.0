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
  </table>
  <table border="1px" width="100%">
    <thead>
    <tr>
     <th bgcolor="lightgray">LOTE</th>
     <th bgcolor="lightgray">ENDERECO</th>
     <th bgcolor="lightgray" colspan="2">QUANTIDADE SISTEMA
      <table>
        <tr>
         <td><b>DISPONIVEL</b></td>
         <td><b> RESERVADO</b></td>
       </tr>
       </table>
      </th>
     <th bgcolor="lightgray" width="10%">CONTAGEM FISICA</th>
    </tr>
    </thead>
    @foreach($dados as $item)
  <tr>
  <td><center>{{ $item->lote }}</center></td>
  <td><center>{{ $item->endereco }}</center></td>
  <td><center>  </center></td>
  <td><center>  </center></td>
  <td><center>  </center></td>
  </tr>
  @endforeach
   </table>
   <table border="1px" width="100%">
    <thead>
     <tr><th bgcolor="lightgray">OBSERVAÇÕES E DETALHES</th></tr>
    </thead>
    <tr><td>{{ $detalhe }}</td></tr>
   </table>
   <table width="100%">
    <thead>
    <tr>
    <td><b>DATA:</b> {{ $dateDay }}</td>
    <td><b>ESTOQUISTA:</b> {{ $estoquista }}</td>
    <td><b>VALIDADOR:</b> {{ $validador }}</td>
	</tr>
	</thead>
   </table>

</body>
</html>
