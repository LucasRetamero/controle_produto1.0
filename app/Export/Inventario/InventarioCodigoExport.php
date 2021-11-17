<?php

namespace App\Export\Inventario;

use App\Models\Cadastro\EstoqueDAO;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class InventarioCodigoExport implements FromView,ShouldAutoSize
{

   use RegistersEventListeners;
   
   protected $consulta;
   
   public function __construct($consulta){
	$this->consulta =  $consulta; 
   }
  
   public function view(): View{
        return view('export.inventarioExport', [
            'dados' => EstoqueDAO::where('codigo', 'like', $this->consulta.'%')->orderBy('endereco')->get()
        ]);
    }
	
 
	public function title(): string
    {
        return 'Lista de Endereço';
    }

	 
	
	
}