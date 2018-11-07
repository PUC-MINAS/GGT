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
            <label for="senha">Senha</label>
        <input type="password" name="senha" class="form-control" id="senha">
    </div>

    <button type="submit" class="btn btn-success btn-fill">Salvar</button>
    <a href="{{url('cadastro')}}" class="btn btn-danger btn-fill">Cancelar</a>
</form>

@endsection
