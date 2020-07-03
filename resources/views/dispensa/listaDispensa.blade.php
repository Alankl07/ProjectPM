@extends('inicial')

@section('body')
<div id="tabela2">
    <ul class="list-group">
        <li id="tabsus" id="litable" class="list-group-item active">
            <h4 class="h4nome">Solicitante</h4>
            <h4 class="statusDispensa">Status</h4>
            </h4>
        </li>
        @foreach($dispensa as $disp)
        @if($disp == "")
            <h1>Nenhuma Dispensa solicitada</h1>
        @endif
        @if(Auth::user()->matricula == $disp->Matricula || Auth::user()->setorAtuacao == 'SPO' ||
        Auth::user()->chefedoSetor == 'SPO' || Auth::user()->chefedoSetor == $disp->setorAtuacao )
        <a href="{{route('dispensa.show', $disp)}}">
            <li id="tabela2" class="list-group-item">
                <h4 class="h4nome">{{$disp->Solicitante}}</h4>
                <h4 class="statusDispensa">{{$disp->Status}}</h4>
                <h4 style="left:83%" class="h4qtd">
                    @if(Auth::User()->matricula == $disp->Matricula && $disp->Status == "Aguardando Confirmação")
                    <form action="{{route('dispensa.destroy', $disp)}}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancelar Solicitação</button></form>
                    @endif
                </h4>
            </li>
        </a>
        @endif


        @endforeach
        </li>
    </ul>
</div>
@endsection('body')