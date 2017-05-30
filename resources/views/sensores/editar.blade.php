@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('sensores.index') }}">Sensores</a></li>
                        <li class="active">Editar</li>
                </ol>
                
                <div class="panel-body">
                
                    <form action="{{ route('sensores.atualizar', $sensores->id) }}" method="post">
                        
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome do sensor" value="{{$sensores->nome}}">
                        </div>   

                        <div class="form-group">
                            <label for="nome">Tipo</label>
                            @if($dadosTipoSensor)
                                
                                <select class="form-control" type="int" name="sensores_tipos_id">
                                    @foreach($dadosTipoSensor as $desc)
                                        <option value="{{$desc->id}}" {{($sensores->sensores_tipos_id == $desc->id) ? "selected" : "" }} >{{$desc->nome}}</option>
                                    @endforeach
                                </select>
                            @else
                                <select class="select-group">
                                    <option value="">NÃO ENCONTRADO.</option>
                                </select>
                            @endif
                        </div> 

                        <button class="btn btn-info">Salvar</button>

                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
