@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('cliente.index') }}">Clientes</a></li>
                    <li class="active">Detalhe</li>
                </ol>
                
                <div class="panel-body">
                    <p>
                        <b>Cliente: </b>{{ $cliente->nome }}
                    </p>

                    <p>
                        <b>Email: </b>{{ $cliente->email }}
                    </p>

                    <p>
                        <b>Endereço: </b>{{ $cliente->endereco }}
                    </p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Número</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cliente->telefones as $telefone)
                                <tr>
                                    <th scope="row">{{$telefone->id}}</th>
                                    <td>{{$telefone->titulo}}</td>
                                    <td>{{$telefone->telefone}}</td>
                                    <td>
                                        <center>
                                        <a class="btn btn-warning" href="{{ route('telefone.editar', $telefone->id) }}">Editar</a>
                                        <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('telefone.deletar', $telefone->id) }}' : false )">Deletar</a>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>
                        <a class="btn btn-success" href="{{ route('telefone.adicionar', $cliente->id) }}">Adicionar Telefone</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
