@extends('inicial')

@section('body')
    <h1>Crimes</h1>
    <form action="{{route('crimes.store')}}" method="POST">
    @csrf   
        <div id="div_susp">
            <div class="nomesus">
                <label for="susp">Suspeito</label>
                <input type="text" class="form-control" name="susp" id="susp" value="{{$crime->nome}}">
            </div>
            <input type="hidden" name="id" value="{{$crime->id}}">
            <div class="vulgosus">
                <label for="crime">Crime</label>
                <input type="text" class="form-control" name="crime" id="crime">
            </div>
            <div class="comparsa">
                <label for="comparsa">comparsa</label>
                <input type="text" class="form-control" name="comparsa" id="comparsa">
            </div>
            
            <?php date_default_timezone_set('America/Sao_Paulo'); $now = new DateTime(); $datetime = $now->format('Y-m-d');?>
            <div class="dataprisao">
                <input class="form-control" name="data" type="hidden" value="{{$datetime}}">
            </div>
            <div class="btnsus">
                <button id="btnsus" type="submit" class="btn btn-primary">Finalizar cadastro</button>
            </div>
        </div>
    </form>
@endsection('body')