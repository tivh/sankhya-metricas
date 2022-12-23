<?php

namespace App\Console\Commands;

use App\Models\Faturamento;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExportFaturamento extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:fat';

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
        Faturamento::truncate();

        $faturados = DB::select(DB::raw("SELECT DISTINCT
            CAB.NUNOTA,
            ITE.CONTROLE,
            PAR.NOMEPARC CLIENTE,
            PRO.DESCRPROD,
            GRU.DESCRGRUPOPROD GRUPO,
            GRUPAI.DESCRGRUPOPROD SEGMENTO FROM TGFCAB CAB
            INNER JOIN TGFITE ITE ON ITE.NUNOTA = CAB.NUNOTA
            INNER JOIN TGFPRO PRO ON PRO.CODPROD = ITE.CODPROD
            INNER JOIN TGFPAR PAR ON PAR.CODPARC = CAB.CODPARC
            INNER JOIN TGFGRU GRU ON GRU.CODGRUPOPROD = PRO.CODGRUPOPROD
            INNER JOIN TGFGRU GRUPAI ON GRU.CODGRUPAI  = GRUPAI.CODGRUPOPROD
            WHERE
            CAB.CODTIPOPER IN (1100, 1125)
            AND CAB.STATUSNFE = 'A'
            AND LENGTH(ITE.CONTROLE)=12
            UNION
            SELECT DISTINCT
            CAB.NUNOTA,
            ITE.CONTROLE,
            PAR.NOMEPARC CLIENTE,
            PRO.DESCRPROD,
            GRU.DESCRGRUPOPROD GRUPO,
            GRUPAI.DESCRGRUPOPROD SEGMENTO FROM TGFCAB CAB
            INNER JOIN TGFITE ITE ON ITE.NUNOTA = CAB.NUNOTA
            INNER JOIN TGFPRO PRO ON PRO.CODPROD = ITE.CODPROD
            INNER JOIN TGFPAR PAR ON PAR.CODPARC = CAB.CODPARC
            INNER JOIN TGFGRU GRU ON GRU.CODGRUPOPROD = PRO.CODGRUPOPROD
            INNER JOIN TGFGRU GRUPAI ON GRU.CODGRUPAI  = GRUPAI.CODGRUPOPROD
            WHERE
            1=1
            AND CAB.STATUSNFE = 'A'
            AND ITE.CODCFO IN (5910, 6910)
            AND LENGTH(ITE.CONTROLE)=12"));


        foreach ($faturados as $faturado){

            $faturados_sankhya = new Faturamento();

            $faturados_sankhya->nunota = $faturado->nunota;
            $faturados_sankhya->numserie = $faturado->controle;
            $faturados_sankhya->cliente = $faturado->cliente;
            $faturados_sankhya->produto = $faturado->descrprod;
            $faturados_sankhya->grupo_produto = $faturado->grupo;
            $faturados_sankhya->segmento = $faturado->segmento;

            $faturados_sankhya->save();

        }

        return 'ok';

    }
}
