<?php

namespace App\Exports;

use App\Models\Vendedor;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SheetsVendedor implements WithMultipleSheets
{
    use Exportable;

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        $vendedores = Vendedor::getVendedores();

        foreach($vendedores as $vendedor){
            $sheets[] = new VendedorExport($vendedor->apelido,  $vendedor->codvend);
        }

        return $sheets;
    }
}
