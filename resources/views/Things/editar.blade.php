@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('Things.index') }}">Things</a></li>
                        <li class="active">Editar</li>
                </ol>
                
                <div class="panel-body">
                
                    <form action="{{ route('Things.atualizar', $Thing->id) }}" method="post">
                        
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome do Thing" value="{{$Thing->nome}}">
                        </div> 

                        <div class="form-group">
                            <label for="nome">Tipo Two</label>
                            <!-- <input type="text" name="TipoTwo_id" class="form-control" placeholder="Tipo Two" value="{{$Thing->TipoTwo_id}}"> -->
                             @if($dadosTipoTwo)
                                
                                <select class="form-control" name="TipoTwo_id">
                                    @foreach($dadosTipoTwo as $desc)
                                        <option value="{{$desc->id}}" {{($Thing->TipoTwo_id == $desc->id) ? "selected" : "" }} >{{$desc->nome}}</option>
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
                            <input type="text" name="potencia" class="form-control" placeholder="Potência" value="{{$Thing->potencia}}">
                        </div> 

                        <button class="btn btn-info">Salvar</button>

                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
