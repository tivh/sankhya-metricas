<?php

namespace App\Exports;

use App\Models\Saldo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Contracts\View\View;

class SaldoRastroExport implements FromView, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('saldo.saldo_rastro', [
            'dados' => Saldo::getSaldoRastro()
        ]);
    }

    public function title(): string
    {
        return  'Saldo';
    }
}

