@extends('index')
@section('title', 'Premiação')

@section('conteudo')

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
       		<li class="breadcrumb-item active" aria-current="page">Premiações</li>
	  </ol>
	</nav>
	
    @if($premios != null)
        <div class="table-responsive-xl">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>         
                        <th scope="col">Vagas</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Prazo de inscrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($premios as $p)
                        <thead>
                            <tr>
                                <th scope="row"><td >{{$p->limite_vagas}}</td> </th> 
                                <td >{{$p->titulo}}</td> 
                                <td ><p>{{$p->descricao}}</p></td>
                                <td >{{$p->valor}}</td>
                                <td >{{$p->data_limite}}</td>
                                <td ><button class="btn btn-primary" href="/premio/regatar">Regatar</button></td>
                            </tr>
                        </thead>
                    @endforeach
                </tbody>
            </table>
        </div>
	@endif
		
@endsection
