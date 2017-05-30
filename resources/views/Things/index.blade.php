@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                        <li>Things</li>
                </ol>
                
                <div class="panel-body">
                    <p>
                        <a class="btn btn-success" href="{{ route('Things.adicionar') }}">Adicionar</a>
                    </p>
                    
                    @if($Thing)
                    <table class="table table-bordered  table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Tipo Two</th>
                                <th>Potencia</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Thing as $Things)
                                <tr>
                                    <th scope="row">{{$Things->id}}</th>
                                    <td>{{$Things->nome}}</td>
                                    <td>{{$Things->DescricaoTipoTwo }}</td>
                                    <td>{{$Things->potencia }}</td>
                                    <td>
                                        <center>
                                        <a class="btn btn-warning" href="{{ route('Things.editar',$Things->id) }}">Editar</a>
                                        <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('Things.deletar', $Things->id) }}' : false )">Deletar</a>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="alert alert-warning">Nenhum Registro encontrado!</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
