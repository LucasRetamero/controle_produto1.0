<?php

namespace App\Export\Inventario;

use App\Models\Cadastro\EstoqueDAO;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class InventarioExport implements FromView,ShouldAutoSize
{

   use RegistersEventListeners;
  
   public function view(): View{
        return view('export.inventarioExport', [
            'dados' => EstoqueDAO::orderBy('endereco')->get()
        ]);
    }
	
 
	public function title(): string
    {
        return 'Lista de Endereço';
    }

	 
	
	
}