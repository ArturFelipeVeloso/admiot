@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('sensores.index') }}">Sensores</a></li>
                        <li class="active">Adicionar</li>
                </ol>
                
                <div class="panel-body">
                
                    <form action="{{ route('sensores.salvar') }}" method="post">
                        
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="int" name="nome" class="form-control" placeholder="Nome do sensor">
                        </div>   

                        <div class="form-group">
                            <label for="nome">Tipo</label>
                            @if($dadosTipoSensor)
                                
                                <select class="form-control" type="int" name="sensores_tipos_id">
                                    @foreach($dadosTipoSensor as $desc)
                                        <option value="{{$desc->id}}">{{$desc->nome}}</option>
                                    @endforeach
                                </select>
                            @else
                                <select class="select-group">
                                    <option value="">NÃO ENCONTRADO.</option>
                                </select>
                            @endif
                        </div>

                        <button class="btn btn-info">Adicionar</button>

                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
