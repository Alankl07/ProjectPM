@extends('inicial')

@section('body')

    <div id="tabela2" >
        <ul class="list-group">
            <li id="litable" class="list-group-item active">Lista de permuta</li>
            @foreach($policial as $pol)
                <a href="{{route('policial.show', $pol)}}"><li id="tabela2" class="list-group-item">{{$pol->nome}}</li></a>
            @endforeach
        </ul>
    </div>
@endsection('body')

