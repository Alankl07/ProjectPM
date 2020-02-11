@extends('inicial')

@section('body')
<div id="tabela2" >
        <ul class="list-group">
            <li id="litable" class="list-group-item active">Lista de Permutas</li>
            @foreach($permutas as $per)
                @if($per->status == 'Confirmada' && Auth::user()->setor == 'SPO' || $per->status == 'Confirmada pelo SPO' && Auth::user()->setor == 'PELOTÃO')
                    <a href="{{route('permutas.show', $per)}}"><li id="tabela2" class="list-group-item">{{$per->nome}}</li></a>
                @endif
            @endforeach
        </ul>
    </div>  
@endsection('body')