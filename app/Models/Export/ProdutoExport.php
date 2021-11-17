<?php

namespace App\Models\Export;

use App\Models\Cadastro\ProdutosDAO;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class ProdutoExport implements FromView,ShouldAutoSize
{

   //use RegistersEventListeners;
 	protected $option,$query;
	
	public function __construct($option, $query){
	$this->option = $option;	
	$this->query = $query;	
	}
	
	public function view(): View{
		
		switch($this->getOption()){
			
		case "nome":
		   return view('export.produtosExport', [
            'dados' => ProdutosDAO::where('nome', 'like', $this->getQuery().'%')->orderBy('nome')->get()
           ]);
		break;
		
		case "codigo":
		   return view('export.produtosExport', [
            'dados' => ProdutosDAO::where('codigo', $this->getQuery())->orderBy('nome')->get()
           ]);
		break;
		
		case "ean":
		   return view('export.produtosExport', [
            'dados' => ProdutosDAO::where('ean', $this->getQuery())->orderBy('nome')->get()
           ]);
		break;
		
		case "fornecedor":
		   return view('export.produtosExport', [
            'dados' => ProdutosDAO::where('fornecedor', 'like', $this->getQuery().'%')->orderBy('nome')->get()
           ]);
		break;
		
		case "subEspecie":
		   return view('export.produtosExport', [
            'dados' => ProdutosDAO::where('sub_especie', 'like', $this->getQuery().'%')->orderBy('nome')->get()
           ]);
		break;
		
    	case "noFilter":
		   return view('export.produtosExport', [
            'dados' => ProdutosDAO::orderBy('nome')->get()
           ]);
		  break;
		}
		
    }
	
	
	public function title(): string
    {
        return 'Lista de Produto';
    }
    
	public function getReportExcel(){
     return \Excel::download(new ProdutoExport($this->getOption(), $this->getQuery()), 'Lista de produtos.xlsx');	
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