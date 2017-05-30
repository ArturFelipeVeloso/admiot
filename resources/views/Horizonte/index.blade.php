@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                        <li>Horizontes de planejamento</li>
                </ol>
                
                <div class="panel-body">
                    <p>
                        <a class="btn btn-success" href="{{ route('Horizonte.adicionar') }}">Adicionar</a>
                    </p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Thing</th>
                                <th>Tipo One</th>
                                <th>Hora Início</th>
                                <th>Hora Fim</th>
                                <th>Duração</th>
                                <th>Consumo p/Intervalo de Tempo</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Horizontes as $Horizonte)
                                <tr>
                                    <th scope="row">{{$Horizonte->id}}</th>
                                    <td>{{$Horizonte->nomeThing}}</td>
                                    <td>{{$Horizonte->nomeTipoOne}}</td>
                                    <td>{{$Horizonte->inicio }}</td>
                                    <td>{{$Horizonte->fim }}</td>
                                    <td>{{$Horizonte->duracao }}</td>
                                    <td>{{$Horizonte->consumoduracao }}</td>
                                    <td>
                                        <center>
                                        <a class="btn btn-warning" href="{{ route('Horizonte.editar',$Horizonte->id) }}">Editar</a>
                                        <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('Horizonte.deletar', $Horizonte->id) }}' : false )">Deletar</a>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
