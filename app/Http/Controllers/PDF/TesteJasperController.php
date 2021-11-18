<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPJasper\PHPJasper;

class TesteJasperController extends Controller
{
    
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
         
    $extensao = 'pdf' ;
    $nome = 'produtoRelatorio';
    $filename =  $nome  . time();
    $output = base_path('/public/report/' . $filename);
	$options = [
    'format' => ['pdf'],
    'locale' => 'en',
    'params' => [],
	'db_connection' => $this->getDatabaseConfigMysql()
    ];
    
	$report = new PHPJasper;
    $report->compile(public_path().'/report/Produtos/ProdutoTodosReport.jrxml')->execute();
   
      $report->process(
      public_path('/report/Produtos/ProdutoTodosReport.jasper'),
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
   if($extensao == 'xls')
    {
      header('Content-Description: Arquivo Excel');
      header('Content-Type: application/x-msexcel');
      header('Content-Disposition: attachment; filename="'.basename($file).'"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($file));
      flush(); // Flush system output buffer
      readfile($file);
      unlink($file) ;
      die();
    }
    else if ($extensao == 'pdf')
     {
       return response()->file($file)->deleteFileAfterSend();
     }
   
   }
   	
}
