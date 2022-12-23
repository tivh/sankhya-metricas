<table>
    <thead>
        <tr>
            <td>COD EMP.</td>
            <td>PODER</td>
            <td>COD. CLIENTE</td>
            <td>CLIENTE</td>
            <td>REGIAO</td>
            <td>CODPROD</td>
            <td>REF.</td>
            <td>LOTE</td>
            <td>PRODUTO</td>
            <td>GRUPO</td>
            <td>SEGMENTO</td>
            <td>DT. VALIDADE</td>
            <td>RASTRO</td>
            <td>USADO</td>
            <td>ARMAZÉM</td>
            <td>DIAS VENC.</td>
        </tr>
    </thead>
    <TBody>
        @foreach ($dados as $dado)
            <tr>
                <td>{{$dado->codemp}}</td>
                <td>{{$dado->poder}}</td>
                <td>{{$dado->cod_cliente}}</td>
                <td>{{$dado->cliente}}</td>
                <td>{{$dado->regiao}}</td>
                <td>{{$dado->codprod}}</td>
                <td>{{$dado->referencia}}</td>
                <td>{{$dado->lote}}</td>
                <td>{{$dado->descrprod}}</td>
                <td>{{$dado->grupo}}</td>
                <td>{{$dado->grupo_pai}}</td>
                <td>{{$dado->dt_val}}</td>
                <td>{{$dado->controle}}</td>
                <td>{{$dado->usado}}</td>
                <td>{{$dado->armazem}}</td>
                <td>{{$dado->dias_venc}}</td>
            </tr>
        @endforeach
    </TBody>
</table>
