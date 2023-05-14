<html>
<body>
<h1>Fazendo Logistica</h1>
<h2>PRODUTOS</h2>
<label><b>Legenda</b></label>
<ul>
 <li><b>COD</b> - Codigo</li>
 <li><b>FOR</b> - Fornecedor</li>
 <li><b>SUB</b> - Sub-Especie</th>
 <li><b>REF</b> - Referencia</th>
 <li><b>CLAS</b> - Classificação</th>
 <li><b>ETI</b> - Etica</th>
</ul>
<hr>
  <table border="1px" style="table-layout:fixed;page-break-inside: avoid;" width="102%">
    <thead>
      <tr>
        <th bgcolor="lightgray"><b>COD</b></th>
        <th bgcolor="lightgray"><b>NOME</b></th>
        <th bgcolor="lightgray"><b>EAN</b></th>
        <th bgcolor="lightgray"><b>FOR</b></th>
        <th bgcolor="lightgray"><b>SUB</b></th>
        <th bgcolor="lightgray"><b>REF</b></th>
        <th bgcolor="lightgray"><b>CLAS</b></th>
        <th bgcolor="lightgray"><b>ETI</b></th>
      </tr>
    </thead>
	@foreach($dados as $item)
    <tr>
      <td>{{$item->codigo}}</td>
      <td style="word-wrap: break-word;">{{$item->nome}}</td>
      <td>{{$item->ean}}</td>
      <td style="word-wrap: break-word;">{{$item->fornecedor}}</td>
      <td style="word-wrap: break-word;">{{$item->sub_especie}}</td>
      <td>{{$item->referencia}}</td>
      <td style="word-wrap: break-word;">{{$item->classificacao}}</td>
      <td>{{$item->etica}}</td>
    </tr>
    @endforeach

  </table>

</body>
</html>
