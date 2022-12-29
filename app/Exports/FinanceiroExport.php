<?php

namespace App\Exports;

use App\Models\Financeiro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Contracts\View\View;

class FinanceiroExport implements FromView, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('financeiro.receber', [
            'dados' => Financeiro::getNotasBaixadas()
        ]);
    }

    public function title(): string
    {
        return  'Financeiro';
    }
    
}
