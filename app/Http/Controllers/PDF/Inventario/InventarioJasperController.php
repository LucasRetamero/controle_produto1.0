<?php

namespace App\Http\Controllers\PDF\Inventario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPJasper\PHPJasper;

class InventarioJasperController extends Controller
{    
     
     protected $option, $query;
	 
     public function __construct($options, $querys){
	  $this->option = $options;
	  $this->query = $querys;	 
	 }
	 
     public function getDatabaseConfigMysql(){
		/*
		        Info to jasperReport connection with phpmyadmin
				'jdbc_driver' => 'com.mysql.jdbc.Driver',
                'jdbc_url' => 'jdbc:mysql://'.env('DB_HOST', 'localhost').':'.env('DB_PORT', '3306').'/'.env('DB_DATABASE', 'controle_produto'),
                'jdbc_dir' => base_path().env('JDBC_DIR', '/vendor/lavela/phpjasper/bin/jasperstarter/jdbc/),
            */
		  return [
            'driver'   => env('DB_CONNECTION'),
            'host'     => env('DB_HOST'),
            'port'     => env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'jdbc_dir' => base_path() . env('JDBC_DIR','/vendor/lavela/phpjasper/bin/jasperstarter/jdbc/'),
        ];
   }
   
   
   public function generateReport(){   
   
    ini_set('max_execution_time', '300'); // 300 = 5 seconds     
    $extensao = 'pdf';
    $nome = 'enderecoRelatorio';
    $filename =  $nome  . time();
    $output = base_path('/public/report/' . $filename);
	switch($this->getOption()){
	  case "codigo":
		$fileToConvertInJasper = '/report/Inventario/inventarioCodigoReport.jrxml';
        $fileConvertedinJasper = '/report/Inventario/inventarioCodigoReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['query' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ];
 	  break;
	  
	  case "nomeProduto":
		$fileToConvertInJasper = '/report/Inventario/inventarioNomeProdutoReport.jrxml';
        $fileConvertedinJasper = '/report/Inventario/inventarioNomeProdutoReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['query' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ];
 	  break;
	  
	  case "fornecedor":
		$fileToConvertInJasper = '/report/Inventario/inventarioFornecedorReport.jrxml';
        $fileConvertedinJasper = '/report/Inventario/inventarioFornecedorReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['query' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ];
 	  break;
	  
	  case "ean":
		$fileToConvertInJasper = '/report/Inventario/inventarioEanReport.jrxml';
        $fileConvertedinJasper = '/report/Inventario/inventarioEanReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['query' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ];
 	  break;
	  
	  case "subEspecie":
		$fileToConvertInJasper = '/report/Inventario/inventarioSubEspecieReport.jrxml';
        $fileConvertedinJasper = '/report/Inventario/inventarioSubEspecieReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['query' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ];
 	  break;
	  
	  case "lote":
		$fileToConvertInJasper = '/report/Inventario/inventarioLoteReport.jrxml';
        $fileConvertedinJasper = '/report/Inventario/inventarioLoteReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['query' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ];
 	  break; 
	  
	  case "endereco":
		$fileToConvertInJasper = '/report/Inventario/inventarioEnderecoReport.jrxml';
        $fileConvertedinJasper = '/report/Inventario/inventarioEnderecoReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['query' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ];
 	  break;
	  
	  case "tipoEndereco":
		$fileToConvertInJasper = '/report/Inventario/inventarioTipoEnderecoReport.jrxml';
        $fileConvertedinJasper = '/report/Inventario/inventarioTipoEnderecoReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['query' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ];
 	  break;
	
		 
      case "noFilter":  
       $fileToConvertInJasper = '/report/Inventario/inventarioTodosReport.jrxml';
       $fileConvertedinJasper = '/report/Inventario/inventarioTodosReport.jasper';	
	   $options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => [],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ];	  
	  break;		
	}
	
	/*$options = [
    'format' => ['pdf'],
    'locale' => 'en',
    'params' => ['codigo' => $codigo],
	'db_connection' => $this->getDatabaseConfigMysql()
    ];*/
    
	$report = new PHPJasper;
    $report->compile(public_path().$fileToConvertInJasper)->execute();
   
      $report->process(
      public_path($fileConvertedinJasper),
      $output,
	  $options
    )->execute();

    /* verificando possiveis erros - Try to output the command using the function output();
    Comente o comando acima e descomente o que esta abaixo, pegue o rerultado e execute no termnial 
    para verificar o erro */

    /*echo $report->process(
      public_path('/report/Produtos/Produtos.jasper') ,
      $output,
      array($extensao),
      array('user_name' => ''),
      $this->getDatabaseConfigMysql(),
      "pt_BR"
    )->output();
     exit();8*/ 
   
   $file = $output .'.'.$extensao ;

   if (!file_exists($file)) {
     abort(404);
   }
   
    return response()->file($file)->deleteFileAfterSend();
 
   }
   
   //Get ------
    public function getOption(){
	 return $this->option;
	}
		
	public function getQuery(){
	 return $this->query;
	}
   
}
