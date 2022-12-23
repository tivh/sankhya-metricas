<?php $total_sum = 0 ?>
<table>
    <thead>
        <tr style="color: #1820E4;">
            <th>Filial</th>
            <th>Num Nota</th>
            <th>Num Único</th>
            <th>TOP</th>
            <th>Cliente</th>
            <th>Hosp. Uso</th>
            <th>Dt. Emissão</th>
            <th>Dt. Faturamento</th>
            {{-- <th>Dt. Vencimento</th> --}}
            <th>Cod. Vendededor</th>
            <th>Vendedor</th>
            <th>Valor Nota</th>
        </tr>
    </thead>
    <tbody>
        @foreach($faturamentos as $fat)
        <tr>
            <td>{{$fat->cod_emp}}</td>
            <td>{{$fat->nm_nota}}</td>
            <td>{{$fat->nm_unico}}</td>
            <td>{{$fat->top}}</td>
            <td>{{$fat->cliente}}</td>
            <td>{{$fat->hosp_uso}}</td>
            <td>{{$fat->dt_emissao}}</td>
            <td>{{$fat->dt_faturamento}}</td>
            {{-- <td>{{$fat->dt_venc}}</td> --}}
            <td>{{$fat->codvend}}</td>
            <td>{{$fat->vendedor}}</td>
            <td>{{$fat->valornota}}</td>
        </tr>
        {{ $total_sum +=  $fat->valornota}}
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2">Total: {{ number_format($total_sum, 2) }}</td>
            <td></td>
        </tr>
    </tbody>
</table>
