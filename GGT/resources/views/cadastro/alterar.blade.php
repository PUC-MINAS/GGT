@extends('layout.principal')
@section('title','Alterar')

@section('conteudo')

<form action="{{ route('cadastro.update',$usuario->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nome">Nome Completo</label>
    <input type="text" name="nome-completo" class="form-control" id="nome-completo" value="{{$usuario->nome}}">
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
    <input type="text" name="email" class="form-control" id="email" value="{{$usuario->email}}">
    </div>
    <div class="form-group">
        <label>Cargo</label>
        <select class="form-control" name="cargo" id="cargo">[
            <option></option>
            <option value=1>Diretor(a)</option>
            <option value=2>Trainee</option>
        </select>
    </div>
    <div class="form-group">
        <label>Diretoria</label>
        <select class="form-control" name="diretoria" id="diretoria">[
            <option></option>
            <option value=1>Diretoria Executiva</option>
            <option value=2>Diretoria Financeira</option>
            <option value=3>Diretoria de Marketing</option>
            <option value=4>Diretoria de Projetos</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success btn-fill">Salvar</button>
    <a href="{{url('cadastro')}}" class="btn btn-danger btn-fill">Cancelar</a>
</form>

@endsection
