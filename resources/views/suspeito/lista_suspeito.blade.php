@extends('inicial')

@section('body')
<div id="tabela2">
    <ul class="list-group">
        <li id="tabsus" id="litable" class="list-group-item active">
            <h4 class="h4nome">Nome</h4>
            <h4 class="h4vulgo">Vulgo</h4>
            <h4 class="h4qtd">Quantidade</h4>
        </li>
        @foreach($suspeito as $sus)
        @if($sus->status != "Ok" && Auth::user()->setor == "SOINT" )
        <a href="{{route('suspeitos.show', $sus)}}">
            <li id="tabela2" class="list-group-item">
                <h4 class="h4nome">{{$sus->nome}}</h4>
                <h4 class="h4vulgo">{{$sus->vulgo}}</h4>
                <h4 style="left:83%" class="h4qtd">{{$sus->quantidadeCrime}}</h4>
            </li>


            <a href="{{route('confirmarRegistroSuspeito', $sus)}}" data-confirm='data-confirm' class="btn btn-success" id="btnConfSus">Confirmar Registro</a>
            <a href="{{route('suspeitos.edit', $sus->id)}}" data-edit='data-edit' class="btn btn-danger" id="btnEditSus">Editar Registro</a>
        </a>
        @endif
        @if($sus->status == "Ok")
        <a href="{{route('suspeitos.show', $sus)}}">
            <li id="tabela2" class="list-group-item">
                <h4 class="h4nome">{{$sus->nome}}</h4>
                <h4 class="h4vulgo">{{$sus->vulgo}}</h4>
                <h4 style="left:83%" class="h4qtd">{{$sus->quantidadeCrime}}</h4>
            </li>
        </a>
        @endif
        @endforeach
    </ul>
</div>
@endsection('body')