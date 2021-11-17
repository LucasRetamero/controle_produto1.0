<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>CODIGO</th>
        <th>NOME</th>
        <th>EAN</th>
        <th>FORNECEDOR</th>
        <th>SUB-ESPECIE</th>
      </tr>
    </thead>
	@foreach($dados as $item)
    <tr>
      <th scope="row">{{ $item->codigo }}</th>
      <td>{{ $item->nome }}</td>
      <td>{{ $item->ean }}</td>
      <td>{{ $item->fornecedor }}</td>
      <td>{{ $item->sub_especie }}</td>
    </tr>
    @endforeach
   
  </table>
  
</html>