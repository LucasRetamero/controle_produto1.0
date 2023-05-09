<?php

namespace App\Export\Endereco;

use App\Models\Cadastro\EnderecoDAO;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;


class EnderecoExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{

   use RegistersEventListeners;
 
   
	public function collection(){
	 return EnderecoDAO::orderBy('endereco')->get();	
	}
	
	public function headings(): array{
	  return ["ID",
	          " ENDERECO"];	
	}
		
	 public static function afterSheet(AfterSheet $event)
    {
		$sheet = $event->sheet->getDelegate();
		
		$sheet->setTitle('Testando');
		$sheet->getStyle('A:F')->getFont()->setSize(20);
		
		$sheet->getStyle('A1:F1')->getFont()
              ->setSize(16)
              ->setBold(true)
              ->getColor()->setRGB('ffffff');
			  
        $sheet->getStyle('A1:F1')->getFill()
               ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
               ->getStartColor()->setARGB('00000000');
    }
	
	
	public function title(): string
    {
        return 'Lista de Endereço';
    }

	 
	
	
}