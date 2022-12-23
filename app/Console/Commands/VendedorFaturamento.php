<?php

namespace App\Console\Commands;

use App\Helpers\Utils;
use App\Mail\SendFatVendedor;
use App\Exports\SheetsVendedor;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class VendedorFaturamento extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:vendedor_fat';

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
        // dd(Utils::MAILS['junior']);
        $date = date('d_m_Y');
        Excel::store(new SheetsVendedor(), 'VENDEDOR\faturamento_vendedor_' . $date . '.xlsx');

        Mail::to(Utils::MAILS)->send(new SendFatVendedor());

        Log::info("Arquivo gerado com sucesso");
    }
}
