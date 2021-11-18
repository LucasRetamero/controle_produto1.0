<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table> 
    <thead>
      <tr>
        <th>ENDERECO</th>
        <th>CODIGO</th>
        <th>NOME_PRODUTO</th>
        <th>LOTE</th>
        <th>QTDE</th>
      </tr>
    </thead>
	@foreach($dados as $item)
    <tr>
	 <td>{{ $item->endereco }}</td>
     <th>{{ $item->codigo }}</th>
     <td>{{ $item->nome_produto }}</td>
     <td>{{ $item->lote }}</td>
     <td> </td>
    </tr>
    @endforeach
   
  </table>
  </html>