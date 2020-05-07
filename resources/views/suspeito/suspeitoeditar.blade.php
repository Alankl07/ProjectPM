@extends('inicial')

@section('body')
<form action="{{route('suspeitos.update', $suspeito)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>Atualizar Cadastro de Suspeitos</h1>
    <div id="div_susp">
        <div class="nomesus {{$errors->has('nome') ? 'has-error' : '' }} ">
            <label for="nomesus">Nome Completo:</label>
            <input class="form-control" value="{{$suspeito->nome}}" name="nome" id="nomesus" size=30>
            @if($errors->has('nome'))
            <span style="color: red" class="help-block">
                {{$errors->first('nome')}}
            </span>
            @endif
        </div>
        <div class="vulgosus {{$errors->has('vulgo') ? 'has-error' : '' }} ">
            <label for="vulgosus">Vulgo:</label>
            <input class="form-control" name="vulgo" id="vulgosus" value="{{$suspeito->vulgo}}">
            @if($errors->has('vulgo'))
            <span style="color: red" class="help-block">
                {{$errors->first('vulgo')}}
            </span>
            @endif
        </div>
        <div class="fotosus {{ $errors->has('foto') ? 'has-error' : '' }} ">
            <label for="fotosus">Foto:</label><br>
            <input type="file" name="foto" id="fotosus" values=" {{$suspeito->foto}} "><br>
            @if($errors->has('foto'))
            <span style="color: red" class="help-block">
                {{$errors->first('foto')}}
            </span>
            @endif
        </div>
        <div class="cpfsus {{ $errors->has('cpf') ? 'has-error' : '' }} ">
            <label for="cpfsus">CPF:</label>
            <input class="form-control" name="cpf" id="cpfsus" value=" {{$suspeito->cpf}} ">
            @if($errors->has('cpf'))
            <span style="color: red" class="help-block">
                {{$errors->first('cpf')}}
            </span>
            @endif
        </div>
        <div class="rgsus {{$errors->has('rg') ? 'has-error' : '' }} ">
            <label for="rgsus">RG:</label>
            <input class="form-control" name="rg" id="rgsus" value=" {{$suspeito->rg}} ">
            @if($errors->has('rg'))
            <span style="color: red" class="help-block">
                {{$errors->first('rg')}}
            </span>
            @endif
        </div>
        <div class="datanasc {{$errors->has('dataNascimento') ? 'has-error' : '' }} ">
            <label for="crimesus">Data de Nascimento:</label>
            <input type="date" class="form-control" name="dataNascimento" id="datanasc" value=" {{$suspeito->dataNascimento}}">
            @if($errors->has('dataNascimento'))
            <span style="color: red" class="help-block">
                {{$errors->first('dataNascimento')}}
            </span>
            @endif
        </div>
        <div class="sexo {{$errors->has('sexo') ? 'has-error' : '' }} ">
            <label for="sexosus">Sexo:</label><br>
            <select id="sex" name="sexo" value="{{$suspeito->sexo}}">
                <option value="{{''}}">-------</option>
                <option name="sexo">Masculino</option>
                <option name="sexo">Feminino</option>
            </select>
            @if($errors->has('sexo'))
            <span style="color: red" class="hel-plock">
                {{$errors->first('sexo')}}
            </span>
            @endif
        </div>
        <div class="estadosus {{$errors->has('estado') ? 'has-error' : '' }} ">
            <label for="estadosus">Estado:</label>
            <input class="form-control" name="estado" id="cidadesus" value=" {{$suspeito->estado}} ">
            @if($errors->has('estado'))
            <span style="color: red" class="help-block">
                {{$errors->first('estado')}}
            </span>
            @endif
        </div>
        <div class="cidadesus {{$errors->has('cidadesus') ? 'has-error' : ''}} ">
            <label for="cidadesus">Cidade:</label>
            <input class="form-control" name="cidadesus" id="cidadesus" value="{{$suspeito->cidade}}">
            @if($errors->has('cidadesus'))
            <span style="color: red" class="help-block">
                {{$errors->first('cidadesus')}}
            </span>
            @endif
        </div>
        <div class="enderecosus {{$errors->has('enderecosus') ? 'has-error' : '' }} ">
            <label for="enderecosus">Endereço:</label>
            <input type="text" class="form-control" name="enderecosus" id="enderecosus" value="{{$suspeito->endereco}}">
            @if($errors->has('enderecosus'))
            <span style="color: red" class="help-block">
                {{$errors->first('enderecosus')}}
            </span>
            @endif
        </div>
        <div class="atu {{$errors->has('localAtuacao') ? 'has-error' : '' }} ">
            <label for="localAtu">Local de Atuação:</label>
            <input class="form-control" name="localAtuacao" id="localAtu" value="{{$suspeito->localAtuacao}}">
            @if($errors->has('localAtuacao'))
            <span style="color: red" class="help-block">
                {{$errors->first('localAtuacao')}}
            </span>
            @endif
        </div>

        <div class="pai {{$errors->has('nomePai') ? 'has-error' : '' }} ">
            <label for="pai">Nome do Pai:</label>
            <input class="form-control" name="nomePai" id="pai" value="{{$suspeito->nomePai}}">
            @if($errors->has('nomePai'))
            <span style="color: red" class="help-block">
                {{$errors->first('nomePai')}}
            </span>
            @endif
        </div>
        <div class="mae {{$errors->has('nomeMae') ? 'has-error' : '' }} ">
            <label for="mae">Nome da Mãe:</label>
            <input class="form-control" name="nomeMae" id="mae" value="{{$suspeito->nomeMae}}">
            @if($errors->has('nomeMae'))
            <span style="color: red" class="help-block">
                {{$errors->first('nomeMae')}}
            </span>
            @endif
        </div>

        <div class="descri {{$errors->has('descri') ? 'has-error' : '' }} ">
            <label for="descri">Obs:</label><br>
            <textarea class="text-break" name="descri" id="descri">{{$suspeito->obs}}</textarea><br>
            @if($errors->has('descri'))
            <span style="color: red" class="help-block">
                {{$errors->first('descri')}}
            </span>
            @endif
        </div>

        <div class="btnsus">
            <button type="submit" id="btnsus" class="btn btn-primary">Editar Cadastro</button>
        </div>
    </div>
</form>
@endsection('body')