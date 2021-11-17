<?php

namespace App\Http\Controllers\PDF\Produtos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPJasper\PHPJasper;

class ProdutoJasperController extends Controller
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
    $nome = 'produtoRelatorio';
    $filename =  $nome  . time();
    $output = base_path('/public/report/' . $filename);
	switch($this->getOption()){
	  case "nome":
		$fileToConvertInJasper = '/report/Produtos/ProdutoNomeReport.jrxml';
        $fileConvertedinJasper = '/report/Produtos/ProdutoNomeReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['codigo' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ];
 	  break;
		 
	  case "codigo":
	    $fileToConvertInJasper = '/report/Produtos/ProdutoCodigoReport.jrxml';
        $fileConvertedinJasper = '/report/Produtos/ProdutoCodigoReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['codigo' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ];	  			
	  break;
		 
	  case "ean":
		$fileToConvertInJasper = '/report/Produtos/ProdutoEanReport.jrxml';
        $fileConvertedinJasper = '/report/Produtos/ProdutoEanReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['codigo' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ]; 
	  break;
		 
	  case "fornecedor":
	    $fileToConvertInJasper = '/report/Produtos/ProdutoFornecedorReport.jrxml';
        $fileConvertedinJasper = '/report/Produtos/ProdutoFornecedorReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['codigo' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ];	
	  break;
		 
	  case "subEspecie": 
		$fileToConvertInJasper = '/report/Produtos/ProdutoSubEspecieReport.jrxml';
        $fileConvertedinJasper = '/report/Produtos/ProdutoSubEspecieReport.jasper';	
		$options = [
         'format' => ['pdf'],
         'locale' => 'en',
         'params' => ['codigo' => $this->getQuery()],
	     'db_connection' => $this->getDatabaseConfigMysql()
          ]; 		
	  break;
		 
      case "noFilter":  
       $fileToConvertInJasper = '/report/Produtos/ProdutoTodosReport.jrxml';
       $fileConvertedinJasper = '/report/Produtos/ProdutoTodosReport.jasper';	
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
