@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('Configuracao.index') }}">Configurações</a></li>
                        <li class="active">Adicionar</li>
                </ol>
                
                <div class="panel-body">
                
                    <form action="{{ route('Configuracao.salvar') }}" method="post">
                        
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nome">Hora de Início</label>
                            <input type="time" name="horainicio" class="form-control" value="00:00">
                        </div> 

                        <div class="form-group">
                            <label for="nome">Hora de Fim</label>
                            <input type="time" name="horafim" class="form-control" value="00:00">
                        </div> 

                        <div class="form-group">
                            <label for="nome">Intervalo de Tempo</label>
                            <input type="time" name="intervalotempo" class="form-control" value="00:00">
                        </div>    

                        <button class="btn btn-info">Adicionar</button>

                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
