@extends('inicial')

@section('body')
    <div id="tabela2">
        <ul class="list-group">
            <li id="tabsus" id="litable" class="list-group-item active"><h4 class="h4nome">Solicitante</h4><h4 class="h4vulgo">Status</h4></h4></li>
                @foreach($abonos as $abono)
                    <a href="{{route('abono.show', $abono)}}">
                        <li id="tabela2" class="list-group-item">
                        <h4 class="h4nome">{{$abono->nome}}</h4>
                        <h4 class="h4vulgo">{{$abono->status}}</h4>
                        <h4 style="left:83%" class="h4qtd">
                    </h4></li></a>
                @endforeach
            </li>
        </ul>
    </div>
@endsection('body')