<html>
<body>
<h1>Fazendo Logistica</h1>
<h2>ENDEREÇOS</h2>
<hr>
  <table border="1px" width="100%">
    <thead>
      <tr>
        <th>ENDERECO</th>
      </tr> <tr>
        <th>AREA-RUA-PREDIO-NIVEL-APTO</th>
      </tr>
    </thead>
	@foreach($dados as $item)
    <tr>
      <td><center>{{ $item->endereco }}</center></td>
    </tr>
    @endforeach
   
  </table>
  
</body>
</html>
