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

            <div class="row">
                    <a href="{{url('/')}}" class="btn btn-primary">Voltar</a>

                    <button type="button" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#avaliarTarefaModal"
                    data-id="{{$tarefa->id}}">Avaliar</button>

                    <form method="POST" action="{{url('tarefas/solicitarCorrecao')}}">
                        <input type="hidden" name="id" value="{{$tarefa->id}}"/>
                        <button type="submit" class="btn btn-danger btn-fill">Solicitar Correção</button>
                    </form>
            </div>

            <!-- @if($tarefa->ativa() && !$tarefa->atrasada())
                <a href="" class="btn btn-success btn-fill">Entregar</a>
            @endif -->

        </div>
	</div>

  <!-- Modal update-->

  <div class="modal fade" id="avaliarTarefaModal" tabindex="-1" role="dialog" aria-labelledby="tarefa">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="avaliarTarefas">Avaliar Tarefa</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="{{url('tarefas/avaliar')}}">

            <div class="form-group">
              <input type="hidden" name="id" class="form-control" id="id" value="{{$tarefa->id}}">
    					<label for="">Recompensa Estimada</label>
    					<input type="number" name="recompensa" id="recompensa" class="form-control" value="{{$tarefa->recompensa}}" disabled>
    				</div>

            <div class="form-group">
      				<label for="pontos">Valor</label>
      				<input type="number" name="pontos" id="pontos" class="form-control" min="0" value="">
      			</div>

      			<button type="submit" class="btn btn-success btn-fill">Avaliar</button>

      			<a href="" class="btn btn-danger btn-fill">Cancelar</a>

           </form>
        </div>
      </div>
    </div>
  </div>

@endsection
