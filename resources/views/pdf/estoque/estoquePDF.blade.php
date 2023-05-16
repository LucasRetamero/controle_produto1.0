<html>
<body>
<h1>Fazendo Logistica</h1>
<h2>INVENTÁRIO</h2>
<hr>
  <table border="1px" width="100%">
    <thead>
      <tr>
        <th bgcolor="lightgray">ENDERECO</th>
        <th bgcolor="lightgray">CODIGO</th>
        <th bgcolor="lightgray">NOME PRODUTO</th>
        <th bgcolor="lightgray">LOTE</th>
        <th bgcolor="lightgray">QTDE</th>
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
