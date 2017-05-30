@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('Things.index') }}">Things</a></li>
                        <li class="active">Adicionar</li>
                </ol>
                
                <div class="panel-body">
                
                    <form action="{{ route('Things.salvar') }}" method="post">
                        
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome do tipo One">
                            @if($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                        </div>  

                        <div class="form-group">
                            <label for="nome">Tipo Two</label>
                            <!-- <input type="text" name="TipoTwo_id" class="form-control" placeholder="Tipo Two"> -->
                            @if($dadosTipoTwo)
                                
                                <select class="form-control" name="TipoTwo_id">
                                    @foreach($dadosTipoTwo as $desc)
                                        <option value="{{$desc->id}}">{{$desc->nome}}</option>
                                    @endforeach
                                </select>
                            @else
                                <select class="select-group">
                                    <option value="">NÃO ENCONTRADO.</option>
                                </select>
                            @endif
                        </div> 

                        <div class="form-group">
                            <label for="nome">Potência</label>
                            <input type="text" name="potencia" class="form-control" placeholder="Potência">
                        </div> 

                        <button class="btn btn-info">Adicionar</button>

                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
