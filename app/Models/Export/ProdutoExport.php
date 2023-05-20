<?php

namespace App\Models\Export;

use App\Models\Cadastro\ProdutosDAO;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ProdutoExport implements FromView, ShouldAutoSize, WithEvents
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

            case "nome":
                return view('export.produtosExport', [
                    'dados' => ProdutosDAO::where('nome', 'like', $this->getQuery() . '%')
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('nome')->get()
                ]);
                break;

            case "codigo":
                return view('export.produtosExport', [
                    'dados' => ProdutosDAO::where('codigo', $this->getQuery())
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('nome')->get()
                ]);
                break;

            case "ean":
                return view('export.produtosExport', [
                    'dados' => ProdutosDAO::where('ean', $this->getQuery())
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('nome')->get()
                ]);
                break;

            case "fornecedor":
                return view('export.produtosExport', [
                    'dados' => ProdutosDAO::where('fornecedor', 'like', $this->getQuery() . '%')
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('nome')->get()
                ]);
                break;

            case "subEspecie":
                return view('export.produtosExport', [
                    'dados' => ProdutosDAO::where('sub_especie', 'like', $this->getQuery() . '%')
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('nome')->get()
                ]);
                break;

            case "noFilter":
                return view('export.produtosExport', [
                    'dados' => ProdutosDAO::where('empresa_id', $this->itemEmpresa)->orderBy('nome')->get()
                ]);
                break;
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('C:C')->getNumberFormat()->setFormatCode('0');
                $event->sheet->getStyle('H:H')->getNumberFormat()->setFormatCode('0');
            },
        ];
    }
    public function title(): string
    {
        return 'Lista de Produto';
    }

    public function getReportExcel()
    {
        return Excel::download(new ProdutoExport($this->getOption(), $this->getQuery(), $this->itemEmpresa), 'Lista de produtos.xlsx');
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
