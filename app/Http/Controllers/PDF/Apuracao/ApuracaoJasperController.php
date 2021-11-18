<?php

namespace App\Http\Controllers\PDF\Apuracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPJasper\PHPJasper;

class ApuracaoJasperController extends Controller
{    
     
     protected $query, $observationDetalhe, $estoquista, $validador;
	 
     public function __construct($querys, $observationDetalhe, $estoquista, $validador){
	  $this->query = $querys;	 
	  $this->observationDetalhe = $observationDetalhe;
	  $this->estoquista = $estoquista; 
	  $this->validador = $validador;
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
    $fileToConvertInJasper = '/report/Apuracao/apuracaoOcorrenciaReport.jrxml';
    $fileConvertedinJasper = '/report/Apuracao/apuracaoOcorrenciaReport.jasper';	
	$options = [
     'format' => ['pdf'],
     'locale' => 'en',
     'params' => ['query' => $this->getQuery(),
	              'obersavionDetalhe' => $this->getObservation(),
				  'estoquista' => $this->getEstoquista(),
				  'validador' => $this->getValidator()],
	 'db_connection' => $this->getDatabaseConfigMysql()
      ];	  
	 
   
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
    public function getObservation(){
	 return $this->observationDetalhe;
	}
	
	public function getEstoquista(){
	 return  $this->estoquista;
	}	 
    
    public function getValidator(){	
	 return $this->validador;
	}
		
	public function getQuery(){
	 return $this->query;
	}
   
}
