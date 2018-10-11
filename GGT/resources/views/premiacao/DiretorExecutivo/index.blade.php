@extends('premiacao.index')
@section('title', 'Premiação')

@section('conteudo')

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
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar"> 
                                    <a href="/premiacao/update/{{$p->id}}"> Editar</a>
                                </button>
                            </td>
			                <td><a href="/premio/delete/{{$p->id}}" class="btn btn-primary btn-fill">Excluir</a></td>
                        </tr>
                    </thead>			    
                @endforeach
            </tbody>
        </table>
    </div>
		@else
		<p>Não existe premios disponiveis</p>
	@endif

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Criar premio</button>

<!-- Modal criar-->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Criar Premiação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      
         <form method="post" action="{{url('/premio/criar')}}">
             <div class="form-group">
            	<label for="nome">Título</label>
				<input type="text" name="titulo" class="form-control" id="titulo" value="">
        	</div>
			<div class="form-group">
				<label for="descricao">Descrição</label>
            	<textarea class="form-control" rows="6" name="descricao" id="descricao" ></textarea>
			</div>
			<div class="form-group">
				<label for="recompensa">Valor</label>
				<input type="number" name="valor" id="valor" class="form-control" min="0" value="">
			</div>

			<div class="form-group">
				<label for="recompensa">Quantidade de Vagas</label>
				<input type="number" name="qtdVagas" id="qtdVagas" class="form-control" min="1" value=" ">
			</div>

			<div class="form-group">
				<label>Data Limite de inscrição</label>
				<input type="date" name="data_expirar" id="data_expirar" class="form-control" placeholder="AAAA-MM-DD" value="">
			</div>
					
			<button type="submit" class="btn btn-success btn-fill">Salvar</button>
			<a href="" class="btn btn-danger btn-fill">Cancelar</a>
     
         </form>
		
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- Modal update-->

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Premiação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      
         <form method="post" action="premio/update/{{$p->id}}">
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
				<input type='date' name="data_expirar" id="data_expirar" class="form-control" placeholder="AAAA-MM-DD" value="{{$p->data_limite}}">
			</div>
					
			<button type="submit" class="btn btn-success btn-fill">atualizar</button>
			<a href="{{url('/premio')}}" class="btn btn-danger btn-fill">Cancelar</a>
     
         </form>
		
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

@endsection
