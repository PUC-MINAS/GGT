@extends('layout.principal')
@section('title', 'Tarefas')

@section('conteudo')

    <nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
	    <!-- <li class="breadcrumb-item"><a href="{{url('tarefas')}}">Tarefas</a></li> -->
	    <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
	  </ol>
	</nav>

    <div class="card">
		<div class="card-header">
			<h4 class="card-title">Tarefa: "{{$tarefa->titulo}}"</h4>
		</div>
		<div class="card-body">
        <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" rows="6" name="descricao" id="descricao" disabled>{{$tarefa->descricao}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Criador</label>
                        <input type="text" class="form-control" value="{{$tarefa->criador()->nome}}" disabled>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="data_limite">Data para entrega</label>
                        <input type="date" name="data_limite" id="data_limite" class="form-control" value="{{$tarefa->data_limite}}" disabled>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="recompensa">Recompensa em FUJcoins</label>
                        <input type="number" name="recompensa" id="recompensa" class="form-control" value="{{$tarefa->recompensa}}" disabled>
                    </div>
                </div>

            </div>

            <a href="{{url('/')}}" class="btn btn-primary btn-fill">Voltar</a>

            
            @if($tarefa->ativa() && !$tarefa->atrasada())

                <form action="{{url('/tarefas/entregar/'.$tarefa->id)}}" method="post" class="formInline">
                    <input type="hidden" name="id" value="{{$tarefa->id}}">
                    <button class="btn btn-default btn-fill">
                        Entregar Tarefa
                    </button>
                </form>
            </form>
            @else
                <a class="btn btn-success btn-fill btn-disabled" disabled alt="Tarefa em Atraso">Entregar</a>
            @endif
            
        </div>
	</div>

@endsection