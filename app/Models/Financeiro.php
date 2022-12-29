<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Financeiro extends Model
{
    use HasFactory;

    



    public function getNotasBaixadas()
    {
        $resultsankhya = DB::select(DB::raw("SELECT DISTINCT
        FIN.CODUSU USUARIO,
        USU.NOMEUSU NOME_USUARIO,
        FIN.CODEMP CODEMP,
        CASE
            WHEN FIN.CODEMP = 1 THEN 'VH'
            WHEN FIN.CODEMP = 3 THEN 'VHRIO'
        END EMPRESA,
        FIN.NUMNOTA NUM_NOTA,
        TO_CHAR(FIN.DTVENC, 'DD/MM/YYYY') DTVENC,
        TO_CHAR(FIN.DHBAIXA, 'DD/MM/YYYY') DTBAIXA, 
        VEN.APELIDO VENDEDOR,
        FIN.DESDOBRAMENTO DESDOBRAMENTO,
        FIN.CODPARC CODPARC,
        PAR.NOMEPARC PARCEIRO,
        FIN.VLRDESDOB VALOR_DESDOBRAMENTO,
        FIN.VLRBAIXA VALOR_BAIXA,
        FIN.NUFIN NU_UNICO,
        CASE
            WHEN FIN.RECDESP = 1 THEN 'RECEITA' ELSE 'DESPESA'
        END RECEITA_DESPESA
        FROM TGFFIN FIN
        INNER JOIN TGFVEN VEN
        ON VEN.CODVEND = FIN.CODVEND
        LEFT JOIN TGFPAR PAR
        ON PAR.CODPARC = FIN.CODPARC
        LEFT JOIN TSIUSU USU
        ON USU.CODUSU = FIN.CODUSU
        WHERE FIN.DHBAIXA BETWEEN add_months(trunc(sysdate,'mm'),-1) AND last_day(add_months(trunc(sysdate,'mm'),-1))
        AND FIN.RECDESP = 1
        AND FIN.CODEMP IN (1,3)
        ORDER BY FIN.NUMNOTA"));

        

       foreach ($resultsankhya as $result)
       {

          $resultProtheus = DB::connection('pgsql2')->select(DB::raw("
          select distinct se1.e1_num, sa3.a3_cod, sa3.a3_nome from se1000 se1
          inner join sa3000 sa3
          on sa3.a3_cod = se1.e1_vend1 and sa3.a3_filial = se1.e1_filial
          where se1.e1_num = '000$result->num_nota'
          and sa3.a3_filial in ('101', '102', '103', '202', '301', '302')
          "));

          if($resultProtheus) $result->vendedor = $resultProtheus[0]->a3_nome;
       }

       
        return $resultsankhya;

        
    }


}
