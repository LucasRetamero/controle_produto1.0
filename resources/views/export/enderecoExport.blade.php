<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>ENDERECO</th>
      </tr>
    </thead>
	@foreach($dados as $item)
    <tr>
      <th scope="row">{{ $item->endereco }}</th>
    </tr>
    @endforeach
   
  </table>
  
</html>