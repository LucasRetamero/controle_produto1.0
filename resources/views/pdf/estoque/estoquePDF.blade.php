<html>
<body>
<h1>Fazendo Logistica</h1>
<h2>INVENTÁRIO</h2>
<hr>
  <table border="1px" style="page-break-inside: avoid;" width="100%">
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
      <td style="white-space: nowrap;">{{ $item->endereco }}</td>
      <td>{{ $item->codigo }}</td>
      <td style="word-wrap: break-word; width: 25%">{{ $item->nome_produto }}</td>
      <td>{{ $item->lote }}</td>
      <td><center>   </center></td>
    </tr>
    @endforeach

  </table>

</body>
</html>
