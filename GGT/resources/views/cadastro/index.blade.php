@extends('layout.principal')
@section('title', 'Cadastro')

@section('conteudo')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
	    <li class="breadcrumb-item"><a href="{{url('cadastro')}}">Cadastrar Membro</a></li>
	  </ol>
	</nav>

	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Cadastrar Membro</h4>
		</div>
		<div class="card-body">

			<form method="POST" action="{{url('cadastro/registro-membro')}}">
				<div class="form-group">
					<label for="nome">Nome Completo</label>
					<input type="text" name="nome-completo" class="form-control" id="nome-completo">
				</div>
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="text" name="email" class="form-control" id="email">
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" name="senha" class="form-control" id="email">
				</div>
				<div class="form-group">
					<label>Cargo</label>
					<select class="form-control" name="cargo" id="cargo">[
						<option></option>
						<option value="Diretor">Diretor(a)</option>
						<option value="Trainee">Trainee</option>
					</select>
				</div>
				<div class="form-group">
					<label>Diretoria</label>
					<select class="form-control" name="diretoria" id="diretoria">[
						<option></option>
						<option value="Diretoria Executiva">Diretoria Executiva</option>
						<option value="Diretoria Financeira">Diretoria Financeira</option>
						<option value="Diretoria de Marketing">Diretoria de Marketing</option>
						<option value="Diretoria de Projetos">Diretoria de Projetos</option>
					</select>
				</div>
				<button type="submit" class="btn btn-success btn-fill">Cadastrar</button>
				<a href="{{url('cadastro')}}" class="btn btn-danger btn-fill">Cancelar</a>
			</form>

		</div>
	</div>
</div>
@endsection
