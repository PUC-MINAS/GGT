@extends('premiacao.index')
@section('title', 'Premiação')

@section('conteudo')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Criar premio</button>

@if($premios != null)
      <div class="table-responsive-xl">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Status</th>
                        <th scope="col">Vagas</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Prazo de inscrição</th>
                    </tr>
                </thead>
                <tbody>
                          
                       
                    @foreach($premios as $p)
                        
                        <?php 
                          $disponivel;
                          date_default_timezone_set('America/Sao_Paulo');
                          $data = date('Y-m-d');

                          if ($p->limite_vagas > 0) { 
                             $disponivel = true;
                          } else { 
                            $disponivel = false ; 
                          }
                        ?>
                       @if($disponivel)             
                         <thead>
                              <tr>
                                  <th scope="row"><td >Premios disponiveis</td></th>
                                  <td >{{$p->limite_vagas}}</td> 
                                  <td >{{$p->titulo}}</td> 
                                  <td ><p>{{$p->descricao}}</p></td>
                                  <td >{{$p->valor}}</td>
                                  <td >{{$p->data_limite}}</td>
                                  <td>
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" data-titulo="{{$p->titulo}}" data-id="{{$p->id}}"
                                    data-descricao="{{$p->descricao}}" data-valor ="{{$p->valor}}" data-vagas="{{$p->limite_vagas}}" data-time="{{$p->data_limite}}" >Editar</button>
                                  </td>
                                <td><a href="/premio/delete/{{$p->id}}" class="btn btn-primary btn-fill">Excluir</a></td>
                              </tr>
                          </thead>
                          @else
                        <thead>
                              <tr>
                                <th scope="row"><td >Premios indisponiveis</td></th>
                                <td >{{$p->limite_vagas}}</td>
                                <td >{{$p->titulo}}</td> 
                                <td ><p>{{$p->descricao}}</p></td>
                                <td >{{$p->valor}}</td>
                                <td >{{$p->data_limite}}</td>
                                <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" data-titulo="{{$p->titulo}}" data-id="{{$p->id}}"
                                  data-descricao="{{$p->descricao}}" data-valor ="{{$p->valor}}" data-vagas="{{$p->limite_vagas}}" data-time="{{$p->data_limite}}" >Editar</button>
                                </td>
                              <td><a href="/premio/delete/{{$p->id}}" class="btn btn-primary btn-fill">Excluir</a></td>
                            </tr>
                        </thead>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
	@endif

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
      
      
         <form method="post" action="{{url('/premio/criar')}}" onSubmit="validar()">
             <div class="form-group">
            	<label for="nome">Título</label>
				<input type="text" name="titulo" class="form-control" id="titulo" value="" required>
        	</div>
			<div class="form-group">
				<label for="descricao">Descrição</label>
            	<textarea class="form-control" rows="6" name="descricao" id="descricao" required></textarea>
			</div>
			<div class="form-group">
				<label for="recompensa">Valor</label>
				<input type="number" name="valor" id="valor" class="form-control" min="0" value="" required>
			</div>

			<div class="form-group">
				<label for="recompensa">Quantidade de Vagas</label>
				<input type="number" name="qtdVagas" id="qtdVagas" class="form-control" min="1" value="" required>
			</div>

			<div class="form-group">
				<label>Data Limite de inscrição</label>
				<input type="date" name="data_expirar" id="data_expirar" class="form-control" placeholder="AAAA-MM-DD" value="" required>
			</div>
					
			<button type="submit" class="btn btn-success btn-fill">Salvar</button> <input type="submit">
			<a href="" class="btn btn-danger btn-fill">Cancelar</a>
     
         </form>
		
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- Modal update-->

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="premio">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="premio->titulo">Editar premio</h4>
      </div>
      <div class="modal-body">
       
      <form method="post" action="{{url('/premio/update')}}">
             <div class="form-group">
            	<label for="nome">Título</label>
              <input type="hidden" name="id" class="form-control" id="id" value="">
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
    </div>
  </div>
</div>
<!-- Script modal -->
  @section('scripts')
      <script>
          $('#modalEditar').on('show.bs.modal', function (event) {
        var premio = $(event.relatedTarget)
        var titulo = premio.data('titulo')
        var descricao = premio.data('descricao')
        var valor = premio.data('valor')
        var data_expirar = premio.data('time')
        var vagas = premio.data('vagas')
        var id = premio.data('id')

        var modal = $(this)
        modal.find('.modal-body #titulo').val(titulo)
        modal.find('.modal-body #descricao').val(descricao)
        modal.find('.modal-body #valor').val(valor)
        modal.find('.modal-body #qtdVagas').val(vagas)
        modal.find('.modal-body #data_expirar').val(data_expirar)
        modal.find('.modal-body #id').val(id)
      })


      function validar(){

        now = new Date

        data = document.getElementById("data_expirar").value.split("-");
        
        if(data[0]<now.getFullYear()){
            alert("Data invalida");
            return false;
        }else{
          if(data[1]<now.getMonth()){
            alert("Data invalida");
            return false;
          }else{
            if(data[3]<now.getDay()){
              alert("Data invalida");
              return false;
            }
          }
        }
      }

      </script>
  @endsection

@endsection

