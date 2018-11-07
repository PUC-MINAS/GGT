@extends('layout.principal')
@section('title', 'Registro')

@section('conteudo')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
	    <li class="breadcrumb-item"><a href="{{url('cadastro')}}">Cadastro de Usuários</a></li>
	  </ol>
	</nav>

	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Cadastrar Usuário</h4>
		</div>
		<div class="card-body">

            <form method="POST" action="{{url('cadastro')}}">
                @csrf
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
					<input type="password" name="senha" class="form-control" id="senha">
				</div>
				<div class="form-group">
					<label>Cargo</label>
					<select class="form-control" name="cargo" id="cargo">[
						<option></option>
						<option value=2>Diretor(a)</option>
						<option value=3>Trainee</option>
					</select>
				</div>
				<div class="form-group">
					<label>Setor</label>
					<select class="form-control" name="diretoria" id="diretoria">[
						<option></option>
						<option value=1>Financeiro</option>
						<option value=2>Marketing</option>
						<option value=3>Projetos</option>
					</select>
				</div>
				<button type="submit" class="btn btn-success btn-fill">Cadastrar</button>
				<a href="{{url('cadastro')}}" class="btn btn-danger btn-fill">Cancelar</a>
			</form>

		</div>
	</div>
</div>
@endsection
