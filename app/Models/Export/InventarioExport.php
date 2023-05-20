<?php

namespace App\Models\Export;

use App\Models\Cadastro\EstoqueDAO;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class InventarioExport implements FromView, ShouldAutoSize
{

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

            case "codigo":
                return view('export.inventarioExport', [
                    'dados' => EstoqueDAO::where('codigo', 'like', $this->getQuery() . '%')
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('endereco')->get()
                ]);
                break;

            case "nomeProduto":
                return view('export.inventarioExport', [
                    'dados' => EstoqueDAO::where('nome_produto', 'like', $this->getQuery() . '%')
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('endereco')->get()
                ]);
                break;

            case "fornecedor":
                return view('export.inventarioExport', [
                    'dados' => EstoqueDAO::where('fornecedor', 'like', $this->getQuery() . '%')
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('endereco')->get()
                ]);
                break;

            case "ean":
                return view('export.inventarioExport', [
                    'dados' => EstoqueDAO::where('ean', $this->getQuery())
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('endereco')->get()
                ]);
                break;

            case "subEspecie":
                return view('export.inventarioExport', [
                    'dados' => EstoqueDAO::where('sub_especie', 'like', $this->getQuery() . '%')
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('endereco')->get()
                ]);
                break;

            case "lote":
                return view('export.inventarioExport', [
                    'dados' => EstoqueDAO::where('lote', 'like', $this->getQuery() . '%')
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('endereco')->get()
                ]);
                break;

            case "endereco":
                return view('export.inventarioExport', [
                    'dados' => EstoqueDAO::where('endereco', 'like', $this->getQuery() . '%')
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('endereco')->get()
                ]);
                break;


            case "tipoEndereco":
                return view('export.inventarioExport', [
                    'dados' => EstoqueDAO::where('tipo_endereco', 'like', $this->getQuery() . '%')
                        ->where('empresa_id', $this->itemEmpresa)
                        ->orderBy('endereco')->get()
                ]);
                break;

            case "noFilter":
                return view('export.inventarioExport', [
                    'dados' => EstoqueDAO::where('empresa_id', $this->itemEmpresa)->orderBy('endereco')->get()
                ]);
                break;
        }
    }



    public function title(): string
    {
        return 'Lista de Inventario';
    }

    public function getReportExcel()
    {
        return Excel::download(new InventarioExport($this->getOption(), $this->getQuery(), $this->itemEmpresa), 'Lista de Inventario.xlsx');
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
