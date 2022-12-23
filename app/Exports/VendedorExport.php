<?php

namespace App\Exports;

use App\Models\Vendedor;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;


class VendedorExport implements FromView, WithTitle
{
    private $vendedor;
    private $codVendedor;

    public function __construct(string $vendedor, int $codVendedor)
    {
        $this->vendedor = $vendedor;
        $this->codVendedor = $codVendedor;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('faturamento.faturamento_vendedor', [
            'faturamentos' => Vendedor::getFaturamento($this->codVendedor)
        ]);
    }

    public function title(): string
    {
        return  $this->vendedor;
    }

}

