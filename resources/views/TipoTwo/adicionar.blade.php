@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('TipoTwo.index') }}">Tipo Two</a></li>
                        <li class="active">Adicionar</li>
                </ol>
                
                <div class="panel-body">
                
                    <form action="{{ route('TipoTwo.salvar') }}" method="post">
                        
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome do tipo Two">
                            @if($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
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
