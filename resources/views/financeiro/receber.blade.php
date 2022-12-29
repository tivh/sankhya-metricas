<?php $total_sum = 0 ?>
<table>
    <thead>
        <tr style="color: #1820E4;">
            <th>Cód. Usuário</th>
            <th>Usuário</th>
            <th>Cód. Empresa</th>
            <th>Empresa</th>
            <th>Num. Nota</th>
            <th>Data Vencimento</th>
            <th>Data Baixa</th>
            <th>Vendedor</th>
            <th>Desdobramento</th>
            <th>Cód. Parceiro</th>
            <th>Parceiro</th>
            <th>Valor Desdobramento</th>
            <th>Valor Baixa</th>
            <th>Número Único</th>
            <th>Receita/Despesa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dados as $dado)
        <tr>
            <td>{{$dado->usuario}}</td>
            <td>{{$dado->nome_usuario}}</td>
            <td>{{$dado->codemp}}</td>
            <td>{{$dado->empresa}}</td>
            <td>{{$dado->num_nota}}</td>
            <td>{{$dado->dtvenc}}</td>
            <td>{{$dado->dtbaixa}}</td>
            <td>{{$dado->vendedor}}</td>
            <td>{{$dado->desdobramento}}</td>
            <td>{{$dado->codparc}}</td>
            <td>{{$dado->parceiro}}</td>
            <td>{{$dado->valor_desdobramento}}</td>
            <td>{{$dado->valor_baixa}}</td>
            <td>{{$dado->nu_unico}}</td>
            <td>{{$dado->receita_despesa}}</td>
        </tr>
        {{ $total_sum +=  $dado->valor_baixa}}
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
