@extends('inicial')

@section('body')
<div class="text-center">
    <div>
        <p>POLÍCIA MILITAR DA BAHIA</p>
        <p>COMANDO DE OPERAÇÕES POLICIAIS MILITARES</p>
        <p>COMANDO DE POLICIAMENTO REGIONAL LESTE</p>
        <p>65º COMPANHIA INDEPENDENTE DE POLÍCIA MILITAR</p>
    </div>
    <div>
        <p>FORMULÁRIO DE ABONO DE SERVIÇO.</p>
    </div>
    <div>
        <p>Eu, {{$abono->nome}}, MAT: {{$abono->num_mat}}</p>
        <p>solicito a V.S.ª autorização para abonar o serviço, no qual estou escalado conforme</p>
        <p>informações abaixo:</p>
        <p>SUBSTITUTO: {{$abono->substituto}}, Matricula: {{$abono->mat_sub}}</p>
    </div>
    <div class="tabelaAbono">
        <ul class=" row ">
            <li class="list-group-item col-md-1">SERVIÇO</li>
            <li class="list-group-item col-md-3">{{$abono->servico}}</li>
            <li class="list-group-item col-md-1">FUNÇÃO</li>
            <li class="list-group-item col-md-2">{{$abono->funcao}}</li>
        </ul>
        <ul class=" row ">
            <li class="list-group-item col-md-1">DATA</li>
            <li class="list-group-item col-md-3">{{date('d/m/Y', strtotime($abono->data))}}</li>
            <li class="list-group-item col-md-1">HORÁRIO</li>
            <li class="list-group-item col-md-2">Dàs {{$abono->das}}, Às {{$abono->as}}</li>
        </ul>
        <ul class=" row ">
            <li class="list-group-item col-md-1 px-2">ASSINATURA</li>
            <li class="list-group-item col-md-6"></li>
        </ul>
    </div>
    <div class="text-center">
        <p>Após assinarmos, estamos cientes que a o Comandante não é responsável por</p>
        <p>gerenciar qualquer situação em que haja conflito ou divergência daquilo que foi acordado</p>
        <p>entre as partes.</p>
    </div>
    <div class="text-center">
        <p>Em ____de_____________de_________,</p>
    </div>
    <div class="text-center">
        <p>____________________________________________________________________________</p>
        <p>Solicitante</p>
    </div>
</div>
<div class="text-center">
    <p>AUTORIZADO</p>
    <p>Em ____/____/______</p>
    <p>________________________________</p>
    <p>CMT DO PELOTÃO</p>
</div>
@endsection('body')