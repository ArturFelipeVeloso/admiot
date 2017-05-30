@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                        <li>Sensores</li>
                </ol>
                
                <div class="panel-body">
                    <p>
                        <a class="btn btn-success" href="{{ route('sensores.adicionar') }}">Adicionar</a>
                    </p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sensores as $sensor)
                                <tr>
                                    <th scope="row">{{$sensor->id}}</th>
                                    <td>{{$sensor->nome}}</td>
                                    <td>{{$sensor->DescricaoTiposSensor}}</td>
                                    <td>{{$sensor->value}}</td>
                                    <td>
                                        <center>
                                        <a class="btn btn-warning" href="{{ route('sensores.editar',$sensor->id) }}">Editar</a>
                                        <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('sensores.deletar', $sensor->id) }}' : false )">Deletar</a>
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
