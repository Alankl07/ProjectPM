@extends('inicial')

@section('body')
    <div class="registropolicial">
        <div class="registropolicia">
            <p style="font-weight: bold;" class="registron">NOME:<br><p class="registronome">{{$policial->nome}}</p></p>
            <p style="font-weight: bold;" class="registrof"><br> <img style="width: 100px; height: 100px;" src="../storage/{{$policial->foto}}"/></p>
            <p style="font-weight: bold;" class="registrom">DATA DE NASCIMENTO:<br><p class="registromatricula">{{ date('d/m/Y', strtotime($policial->dataNascimento))}}</p></p>
            <p style="font-weight: bold;" class="registropa">PATENTE:<br><p class="registropatente">{{$policial->patente}}</p></p>
            <p style="font-weight: bold;" class="registrom">MATRÍCULA:<br><p class="registromatricula">{{$policial->matricula}}</p></p>
            <P style="font-weight: bold;" class="registros">SEXO:<br><p class="registrosexo">{{$policial->sexo}}</p></P>
            <P style="font-weight: bold;" class="registrocp">CPF:<br><p class="registrocpf">{{$policial->cpf}}</p></P>
            <P style="font-weight: bold;" class="registror">RG:<br><p class="registrorg">{{$policial->rg}}</p></P>
            <p style="font-weight: bold;" class="registroe">ESTADO:<br><p class="registroestado">{{$policial->estado}}</p></p>
            <P style="font-weight: bold;" class="registroc">CIDADE:<br><p class="registrocidade">{{$policial->cidade}}</p></P>
            <P style="font-weight: bold;" class="registrou">UNIDADE:<br><p class="registrounidade">{{$policial->pelotao}}</p></P>
    
        </div>
        <form action="{{route('policial.destroy', $policial)}}" method="POST">
            @csrf
            
            @method('DELETE')
            <button style=" position: relative; left: 58%; width:100px; margin:20px; " type="submit" class = "btn btn-danger">Excluir</button>
        </form>    
    </div>
@endsection('body')