@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('Horizonte.index') }}">Horizontes de planejamento</a></li>
                        <li class="active">Adicionar</li>
                </ol>
                
                <div class="panel-body">
                
                    <form action="{{ route('Horizonte.salvar') }}" method="post">
                        
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nome">Thing</label>
                            <!-- <input type="text" name="TipoTwo_id" class="form-control" placeholder="Tipo Two"> -->
                            @if($dadosThings)
                                
                                <select class="form-control" name="Things_id">
                                    @foreach($dadosThings as $desc)
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
                            <label for="nome">Tipo One</label>
                            <!-- <input type="text" name="TipoTwo_id" class="form-control" placeholder="Tipo Two"> -->
                            @if($dadosTipoOne)
                                
                                <select class="form-control" name="TipoOne_id">
                                    @foreach($dadosTipoOne as $desc)
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
                            <label for="nome">Hora de Início</label>
                            <input type="time" name="inicio" class="form-control" value="00:00">
                        </div> 

                        <div class="form-group">
                            <label for="nome">Hora de Fim</label>
                            <input type="time" name="fim" class="form-control" value="00:00">
                        </div> 

                        <div class="form-group">
                            <label for="nome">Duração</label>
                            <input type="time" name="duracao" class="form-control" value="00:00">
                        </div> 

                        <div class="form-group">
                            <label for="nome">Consumo p/ intervalo de tempo</label>
                            <input type="text" name="consumoduracao" class="form-control" placeholder="Consumo por duração">
                        </div>  

                        <button class="btn btn-info">Adicionar</button>

                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
