<html>
<head>
<meta charset="UTF-8">
<title>Controle de Produto - Apuração de Ocorrência</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
	
</style>

</head>
<body>

        <div align="left">
            <h1>Fazendo Logistica</h1>
            <h3>APURAÇÃO DE OCORRÊNCIA</h3>
        </div>
    
  <br/>

  <table border="1" width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>CODIGO</th>
        <th>NOME DO PRODUTO</th>
      </tr>
    </thead>
	@foreach($dados as $item)
    <tr>
      <th scope="row">{{ $item->codigo }}</th>
      <td>{{ $item->nome_produto }}</td>
    </tr>
   @endforeach
   
	<!-- Second Table -->
	<table border="1" width="100%">
	 <tr style="background-color: lightgray;">
	    <td>LOTE</td>
        <td>ENDEREÇO</td>
        <td>QUANTIDADE SISTEMA</td>
        <td>CONTAGEM FISICA</td>
	 </tr>
	@foreach($dados as $item)
    <tr>
      <td scope="row">{{ $item->lote }}</td>
      <td scope="row">{{ $item->endereco }}</td>
	  <td>
	  <table> 
	   <tr style="background-color: lightgray;">
	   <td>DISPONIVEL</td>
	   <td>RESERVADO</td>
	   </tr>
	   <td>{{ $enderecoEmpty }}</td>
	   <td>{{ $enderecoFull }} </td>
	   </table></td>
	  <td >{{ $contagemFisica }}</td>
    </tr>
    @endforeach 

    <table border="1" width="100%">
    <tr> 
	 <td style="background-color: lightgray;">
	 Observações e Detalhes
	 </td>
	</tr>
	 <tr>
	 <td>
	 {{ $observacao_detalhes }}
	 </td>
	 </tr>
    </table>
   </table>	
  </table>
  
  <table width="100%">
   <tr>
   <td><b>DATA:</b> {{ $dateToday }}</td>
   <td><b>ESTOQUISTA:</b> {{ $estoquista }}</td>
   <td><b>VALIDADOR:</b> {{ $validador }}</td>
   </tr>
  </table>
</body>
</html>

<!--
	   <table> 
	   <tr>
	   <td>DISPONIVEL</td>
	   <td>RESERVADO</td>
	   </tr>
	   <td>50</td>
	   <td>100</td>
	   </table>-->
	   
<!-- Example 
  <table width="100%">
    <tr>
        <td valign="top"><img src="{{asset('images/meteor-logo.png')}}" alt="" width="150"/></td>
        <td align="right">
            <h3>Shinra Electric power company</h3>
            <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>From:</strong> Linblum - Barrio teatral</td>
        <td><strong>To:</strong> Linblum - Barrio Comercial</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Playstation IV - Black</td>
        <td align="right">1</td>
        <td align="right">1400.00</td>
        <td align="right">1400.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Metal Gear Solid - Phantom</td>
          <td align="right">1</td>
          <td align="right">105.00</td>
          <td align="right">105.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Final Fantasy XV - Game</td>
          <td align="right">1</td>
          <td align="right">130.00</td>
          <td align="right">130.00</td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal $</td>
            <td align="right">1635.00</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Tax $</td>
            <td align="right">294.3</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray">$ 1929.3</td>
        </tr>
    </tfoot>
  </table>
-->