@extends('layout.principal')
@section('title', 'Tarefas')

@section('conteudo')

    <nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
	    <li class="breadcrumb-item"><a href="{{url('tarefas')}}">Tarefas</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
	  </ol>
	</nav>

    <div class="card">
		<div class="card-header">
			<h4 class="card-title">Tarefa: "{{$tarefa->titulo}}"</h4>
		</div>
		<div class="card-body">
            <div class="form-group">
                <label for="descricao">Descrição</label>
				<textarea class="form-control" rows="6" name="descricao" id="descricao" disabled>{{$tarefa->descricao}}</textarea>
            </div>
            <div class="form-group">
                <label for="recompensa">Recompensa em FUJcoins</label>
                <input type="number" name="recompensa" id="recompensa" class="form-control" value="{{$tarefa->recompensa}}" disabled>
            </div>

            <div class="form-group">
                <label for="data_limite">Data para entrega</label>
                <input type="date" name="data_limite" id="data_limite" class="form-control" value="{{$tarefa->dataLimite}}" disabled>
            </div>

            <div class="form-group">
                <label for="">Status da Tarefa</label>
                <input type="text" class="form-control" value="{{$tarefa->statusTarefa()->titulo}}" disabled>
            </div>

            <div class="form-group">
                <label for="">Criador</label>
                <input type="text" class="form-control" value="{{$tarefa->criador()->nome}}" disabled>
            </div>

            <div class="form-group">
                <label for="">Responsavel</label>
                <input type="text" class="form-control" value="{{$tarefa->responsavel()->nome}}" disabled>
            </div>

            <a href="{{url('tarefas')}}" class="btn btn-primary btn-fill">Voltar</a>

            <a href="{{url('/tarefas/alterar/'.$tarefa->id)}}" class="btn btn-warning btn-fill">
                <i class="nc-icon nc-settings-tool-66" title="Alterar"></i>
                Alterar
            </a>

            <form action="{{'/tarefas/desativar'}}" method="post" class="formInline">
                <input type="hidden" name="id" value="{{$tarefa->id}}">
                <button class="btn btn-default btn-fill">
                    Desativar Tarefa
                </button>
            </form>

            <form action="{{url('/tarefas/deletar')}}" method="POST" class="formInline">
                <input type="hidden" name="id" value="{{$tarefa->id}}">
                <button class="btn btn-danger btn-fill">
                    <i class="fa fa-trash-o" title="Deletar"></i>
                    Deletar
                </button>
            </form>
        </div>
	</div>

@endsection