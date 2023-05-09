<html>
<body>
<h1>Fazendo Logistica</h1>
<h2>PRODUTOS</h2>
<hr>
  <table border="1px">
    <thead>
      <tr>
        <th><b>CODIGO</b></th>
        <th><b>NOME</b></th>
        <th><b>EAN</b></th>
        <th><b>FORNECEDOR</b></th>
        <th><b>SUB-ESPECIE</b></th>
      </tr> 
    </thead>
	@foreach($dados as $item)
    <tr>
      <td><center>{{ $item->codigo }}</center></td>
      <td><center>{{ $item->nome }}</center></td>
      <td><center>{{ $item->ean }}</center></td>
      <td><center>{{ $item->fornecedor }}</center></td>
      <td><center>{{ $item->sub_especie }}</center></td>
    </tr>
    @endforeach
   
  </table>
  
</body>
</html>
