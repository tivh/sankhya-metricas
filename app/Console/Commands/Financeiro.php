<?php

namespace App\Console\Commands;

use App\Exports\FinanceiroExport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Financeiro extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:finan';

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
        Excel::store(new FinanceiroExport(), 'FINANCEIRO\receber_' . $date . '.xlsx');

        Log::info("Arquivo gerado com sucesso em:". $date);
    }

}
