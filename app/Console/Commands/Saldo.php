<?php

namespace App\Console\Commands;

use App\Exports\SaldoExport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Saldo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:saldo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exportar saldo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = date('d_m_Y');
        Excel::store(new SaldoExport(), 'SALDO\saldo_' . $date . '.xlsx');

        Log::info("Arquivo gerado com sucesso");
    }
}
