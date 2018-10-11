
@extends('layout.principal')

@section('title', 'Editar Premiacao')

@section('conteudo')

    	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Premiações</li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
	  </ol>
	</nav>

    <form method="post" action="/premio/update/{{$p->id}}">
             <div class="form-group">
            	<label for="nome">Título</label>
				<input type="text" name="titulo" class="form-control" id="titulo" value="{{$p->titulo}}">
        	</div>
			<div class="form-group">
				<label for="descricao">Descrição</label>
            	<textarea class="form-control" rows="6" name="descricao" id="descricao" >{{$p->descricao}}</textarea>
			</div>
			<div class="form-group">
				<label for="recompensa">Valor</label>
				<input type="number" name="valor" id="valor" class="form-control" min="0" value="{{$p->valor}}">
			</div>

			<div class="form-group">
				<label for="recompensa">Quantidade de Vagas</label>
				<input type="number" name="qtdVagas" id="qtdVagas" class="form-control" min="1" value="{{$p->limite_vagas}}">
			</div>

			<div class="form-group">
				<label>Data Limite de inscrição</label>
				<input type="date" name="data_expirar" id="data_expirar" class="form-control" placeholder="AAAA-MM-DD" value="{{$p->data_limite}}">
			</div>
					
			<button type="submit" class="btn btn-success btn-fill">atualizar</button>
			<a href="{{url('premiacao/show')}}" class="btn btn-danger btn-fill">Cancelar</a>
     
</form>

@endsection