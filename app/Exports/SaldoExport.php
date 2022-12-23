<?php

namespace App\Exports;

use App\Models\Saldo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Contracts\View\View;

class SaldoExport implements FromView, WithTitle
{
   /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('saldo.saldo', [
            'dados' => Saldo::getSaldo()
        ]);
    }

    public function title(): string
    {
        return  'Saldo';
    }
}
