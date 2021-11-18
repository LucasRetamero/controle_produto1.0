<?php

namespace App\Models\Export;

use App\Models\Cadastro\EnderecoDAO;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;


class EnderecoExport implements FromView,ShouldAutoSize
{

  //use RegistersEventListeners;
 	protected $option,$query;
	
	public function __construct($option, $query){
	$this->option = $option;	
	$this->query = $query;	
	}
	
	public function view(): View{
		
		switch($this->getOption()){
			
		case "endereco":
		   return view('export.enderecoExport', [
            'dados' => EnderecoDAO::where('endereco', 'like', $this->getQuery().'%')->orderBy('endereco')->get()
           ]);
		break;
		
    	case "noFilter":
		   return view('export.enderecoExport', [
            'dados' => EnderecoDAO::orderBy('endereco')->get()
           ]);
		  break;
		}
		
    }
	
	
	public function title(): string
    {
        return 'Lista de Endereço';
    }
    
	public function getReportExcel(){
     return \Excel::download(new EnderecoExport($this->getOption(), $this->getQuery()), 'Lista de endereco.xlsx');	
	}	
	
	// --------- GET -------------
	public function getOption(){
	 return $this->option;	
	}
	
	public function getQuery(){
	 return $this->query;	
	}
	
	// --------- SET -------------
	public function setOption($option){
	 return $this->option = $option;	
	}
	
	public function setQuery($query){
	 return $this->query = $query;	
	}
	
}