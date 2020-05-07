@extends('inicial')

@section('body')

<div id="tabela2">
    <ul class="list-group">
        <li id="litable" class="list-group-item active">Lista de Policiais</li>
        @foreach($policial as $pol)
        @if($pol->status == "Ok" ||Auth::User()->setor == "SPO")  
        <a href="{{route('policial.show', $pol)}}">
            <li id="tabela2" class="list-group-item">{{$pol->nome}}
        @if(Auth::User()->setor == "SPO" && $pol->status != "Ok")
                 <a href="{{route('confirmarRegistroPolicial', $pol)}}"  data-confirm='data-confirm' class="btn btn-success" id="btnConf" >Confirmar Registro</a>
                 <a href="{{route('policial.edit', $pol->id)}}" data-edit='data-edit' class="btn btn-danger" id="btnEdit">Editar Registro</a>
                @endif
        @endif</li>
        </a>
        @endforeach
    </ul>
</div>
@endsection('body')