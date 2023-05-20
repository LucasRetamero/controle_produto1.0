<?php

namespace App\Models\Export;

use App\Models\Cadastro\EnderecoDAO;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class EnderecoExport implements FromView, ShouldAutoSize
{

    //use RegistersEventListeners;
    protected $option, $query, $itemEmpresa;

    public function __construct($option, $query, $itemEmpresa)
    {
        $this->option = $option;
        $this->query = $query;
        $this->itemEmpresa = $itemEmpresa;
    }

    public function view(): View
    {

        switch ($this->getOption()) {

            case "endereco":
                return view('export.enderecoExport', [
                    'dados' => EnderecoDAO::where('endereco', 'like', $this->getQuery() . '%')
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('endereco')->get()
                ]);
                break;

            case "noFilter":
                return view('export.enderecoExport', [
                    'dados' => EnderecoDAO::where('empresa_id', $this->itemEmpresa)->orderBy('endereco')->get()
                ]);
                break;
        }
    }


    public function title(): string
    {
        return 'Lista de Endereço';
    }

    public function getReportExcel()
    {
        return Excel::download(new EnderecoExport($this->getOption(), $this->getQuery(), $this->itemEmpresa), 'Lista de endereco.xlsx');
    }

    // --------- GET -------------
    public function getOption()
    {
        return $this->option;
    }

    public function getQuery()
    {
        return $this->query;
    }

    // --------- SET -------------
    public function setOption($option)
    {
        return $this->option = $option;
    }

    public function setQuery($query)
    {
        return $this->query = $query;
    }
}
