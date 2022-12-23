<?php

namespace App\Console\Commands;

use App\Exports\SaldoRastro as ExportsSaldoRastro;
use App\Exports\SaldoRastroExport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class SaldoRastro extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:saldoRastro';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Excel::store(new SaldoRastroExport(), 'SALDO\saldo x rastro_' . $date . '.xlsx');

        Log::info("Arquivo gerado com sucesso");
    }
}
