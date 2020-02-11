@extends('inicial')

@section('body')
    <div id="tabela2" >
        <ul class="list-group">
            <li id="tabsus" id="litable" class="list-group-item active"><h4 class="h4nome">Nome</h4><h4 class="h4vulgo">Vulgo</h4><h4 class="h4qtd">Quantidade</h4></li>
            @foreach($suspeito as $sus)
                <a href="{{route('suspeitos.show', $sus)}}"><li id="tabela2" class="list-group-item"><h4 class="h4nome">{{$sus->nome}}</h4> <h4 class="h4vulgo">{{$sus->vulgo}}</h4> <h4 style="left:83%" class="h4qtd">{{$sus->quantidadeCrime}}</h4></li></a>
            @endforeach
        </ul>
    </div>      
@endsection('body')