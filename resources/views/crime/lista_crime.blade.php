@extends('inicial')

@section('body')
    <h1>Crimes</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Suspeito</th>
      <th scope="col">Crime</th>
      <th scope="col">Data</th>
      <th scope="col">Comparsa</th>
    </tr>
  </thead>
  <tbody>
  @foreach($crimes as $crimes)
    @if($crimes->id_suspeito == $crime)
        <tr>       
        <td>{{$crimes->suspeito}}</td>
        <td>{{$crimes->crime}}</td>
        <td>{{date( 'd/m/Y' , strtotime($crimes->data))}}</td>
        <td>{{$crimes->comparsa}}</td>
        <td>
        <form action = "{{route('crimes.destroy', $crimes)}}" method = "POST">
            @csrf
            <a class = "btn btn-success" href="{{route('crimes.edit', $crimes)}}">Editar</a>
            @method('DELETE')
            <button type = "submit" class = "btn btn-danger">Excluir</button>
        </form>  
        </td>
        </tr>
    @endif
@endforeach
  </tbody>
</table>
@endsection('body')