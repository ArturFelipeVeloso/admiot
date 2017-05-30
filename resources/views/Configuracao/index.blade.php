@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                        <li>Configurações</li>
                </ol>
                
                <div class="panel-body">
                    <p>
                        <a class="btn btn-success" href="{{ route('Configuracao.adicionar') }}">Adicionar</a>
                    </p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hora de início</th>
                                <th>Hora de termino</th>
                                <th>Intervalo de tempo</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Configuracoes as $Config)
                                <tr>
                                    <th scope="row">{{$Config->id}}</th>
                                    <td>{{$Config->horainicio}}</td>
                                    <td>{{$Config->horafim}}</td>
                                    <td>{{$Config->intervalotempo}}</td>
                                    <td>
                                        <center>
                                        <a class="btn btn-warning" href="{{ route('Configuracao.editar',$Config->id) }}">Editar</a>
                                        <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('Configuracao.deletar', $Config->id) }}' : false )">Deletar</a>
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
