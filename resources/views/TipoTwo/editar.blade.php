@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('TipoTwo.index') }}">Tipo Two</a></li>
                        <li class="active">Editar</li>
                </ol>
                
                <div class="panel-body">
                
                    <form action="{{ route('TipoTwo.atualizar', $TipoTwos->id) }}" method="post">
                        
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome do tipoOne" value="{{$TipoTwos->nome}}">
                        </div> 

                        <button class="btn btn-info">Salvar</button>

                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
