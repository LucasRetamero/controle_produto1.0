<html>
<body>
<h1>Fazendo Logistica</h1>
<h2>INVENTÁRIO</h2>
<hr>
  <table border="1px" width="100%">
    <thead>
      <tr>
        <th>ENDERECO</th>
        <th>CODIGO</th>
        <th>NOME PRODUTO</th>
        <th>LOTE</th>
        <th>QTDE</th>
      </tr> 
    </thead>
	@foreach($dados as $item)
    <tr>
      <td><center>{{ $item->endereco }}</center></td>
      <td><center>{{ $item->codigo }}</center></td>
      <td><center>{{ $item->nome_produto }}</center></td>
      <td><center>{{ $item->lote }}</center></td>
      <td><center> </center></td>
    </tr>
    @endforeach
   
  </table>
  
</body>
</html>
