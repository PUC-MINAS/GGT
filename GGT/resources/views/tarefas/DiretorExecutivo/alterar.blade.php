@extends('layout.principal')
@section('title', 'Tarefa')

@section('conteudo')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('tarefas')}}">Tarefas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Alterar</li>
        </ol>
    </nav>

    <div class="card">
		<div class="card-header">
			<h4 class="card-title">Alterar Tarefa</h4>
		</div>
		<div class="card-body">
            <form method="POST" action="{{url('tarefas/update')}}">
				<input type="hidden" name="id" value="{{$tarefa->id}}">
                <div class="form-group">
					<label for="nome">Título</label>
					<input type="text" name="titulo" class="form-control" id="titulo" value='{{$tarefa->titulo}}'>
				</div>
				<div class="form-group">
					<label for="descricao">Descrição</label>
					<textarea class="form-control" rows="6" name="descricao" id="descricao">{{$tarefa->descricao}}</textarea>
				</div>
				<div class="form-group">
					<label for="recompensa">Recompensa em FUJ</label>
					<input type="number" name="recompensa" id="recompensa" class="form-control" value="{{$tarefa->recompensa}}">
				</div>

				<div class="form-group">
					<label for="data_limite">Data para entrega</label>
					<input type="date" name="data_limite" id="data_limite" class="form-control" value="{{$tarefa->data_limite}}">
				</div>
				<div class="form-group">
					<label for="">Responsavel</label>
					<select class="form-control" name="responsavel" id="responsavel">
						<!--<option value="{{$tarefa->responsavel->id}}" selected<>{{$tarefa->responsavel->nome}}</option>-->
						@foreach($subordinados as $s)
							@if($s->id == $tarefa->responsavel->id)
								<option value="{{$s->id}}" selected>{{$s->nome}}</option>
							@else
								<option value="{{$s->id}}">{{$s->nome}}</option>
							@endif
						@endforeach
						<!--<option value="2">Subordinado2</option>
						<option value="3">Subordinado3</option>
						<option value="4">Subordinado4</option>
						<option value="5">Subordinado5</option>-->
					</select>
				</div>
                <button type="submit" class="btn btn-success btn-fill">Salvar Alterações</button>
				<a href="{{url('tarefas')}}" class="btn btn-danger btn-fill">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection