@extends('layout.principal')
@section('title', 'Premiação')

@section('conteudo')		
		<div class="container-fluid">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
				<li class="breadcrumb-item"><a href="{{url('tarefas')}}">Premiação</a></li>
				<li class="breadcrumb-item active" aria-current="page">Criar</li>
			</ol>
		</nav>
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Criar Novo Premio</h4>
			</div>
			<div class="card-body">
				<form method="POST" action="{{url('premiacao/store')}}">
					<div class="form-group">
						<label for="nome">Título</label>
						<input type="text" name="titulo" class="form-control" id="titulo">
					</div>
					<div class="form-group">
						<label for="descricao">Descrição</label>
						<textarea class="form-control" rows="6" name="descricao" id="descricao"></textarea>
					</div>
					<div class="form-group">
						<label for="recompensa">Valor</label>
						<input type="number" name="valor" id="valor" class="form-control" min="0">
					</div>

					<div class="form-group">
						<label for="recompensa">Quantidade de Vagas</label>
						<input type="number" name="qtdVagas" id="qtdVagas" class="form-control" min="1">
					</div>

					<div class="form-group">
						<label>Data Limite de inscrição</label>
						<input type="date" name="data_expirar" id="data_expirar" class="form-control" placeholder="AAAA-MM-DD">
					</div>
					
					<button type="submit" class="btn btn-success btn-fill">Criar</button>
					<a href="{{url('premiacao')}}" class="btn btn-danger btn-fill">Cancelar</a>
				</form>

			</div>
		</div>	
	</div>
</form>

	<script>
		
	</script>

@endsection
