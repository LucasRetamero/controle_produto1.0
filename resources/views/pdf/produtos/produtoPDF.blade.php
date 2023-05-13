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
        <th><b>REFERENCIA</b></th>
        <th><b>CLASSIFICACAO</b></th>
        <th><b>ETICA</b></th>
      </tr>
    </thead>
	@foreach($dados as $item)
    <tr>
      <td>{{ $item->codigo }}</td>
      <td>{{ $item->nome }}</td>
      <td>{{ $item->ean }}</td>
      <td>{{ $item->fornecedor }}</td>
      <td>{{ $item->sub_especie }}</td>
      <td>{{ $item->referencia }}</td>
      <td>{{ $item->classificacao }}</td>
      <td>{{ $item->etica }}</td>
    </tr>
    @endforeach

  </table>

</body>
</html>
