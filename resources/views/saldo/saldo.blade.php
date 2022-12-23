<table>
    <thead>
        <tr>
            <td>COD EMP.</td>
            <td>CODPROD</td>
            <td>REF.</td>
            <td>GRUPO</td>
            <td>SEGMENTO</td>
            <td>PRODUTO</td>
            <td>SALDO LOCAL</td>
            <td>SALDO P3</td>
            <td>USADO</td>
            <td>FATURADOS</td>
            <td>P3 LIQ</td>
            <td>CONSUMO 90</td>
            <td>LOCAL VENCE ANO ATUAL</td>
            <td>P3 VENCE ANO ATUAL</td>
            <td>PERDA</td>
        </tr>
    </thead>
    <TBody>
        @foreach ($dados as $dado)
            <tr>
                <td>{{ $dado->ad_codemp }}</td>
                <td>{{ $dado->codprod }}</td>
                <td>{{ $dado->referencia }}</td>
                <td>{{ $dado->grupo }}</td>
                <td>{{ $dado->grupo_pai }}</td>
                <td>{{ $dado->descrprod }}</td>
                <td>{{ $dado->saldo_local }}</td>
                <td>{{ $dado->saldo_p3 }}</td>
                <td>{{ $dado->usado }}</td>
                <td>{{ $dado->faturados }}</td>
                <td>{{ $dado->p3_liquido }}</td>
                <td>{{ $dado->consumo_90 }}</td>
                <td>{{ $dado->vence_local_ano_atual }}</td>
                <td>{{ $dado->p3_vence_ano_atual }}</td>
                <td>{{ $dado->perda }}</td>
            </tr>
        @endforeach
    </TBody>
</table>
