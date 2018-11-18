@extends('layout.principal')
@section('title', 'Premiação')

@section('conteudo')
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
       		<li class="breadcrumb-item active" aria-current="page">Premiações</li>
	  </ol>
	</nav>
	 
    <a href="/premio/meusPremios/" class="btn btn-primary btn-fill">Meus Premios</a>

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
                        @if ($p->limite_vagas > 0)
                         <thead>
                              <tr>
                                  <th scope="row"><td >{{$p->limite_vagas}}</td> </th> 
                                  <td >{{$p->titulo}}</td> 
                                  <td ><p>{{$p->descricao}}</p></td>
                                  <td >{{$p->valor}}</td>
                                  <td >{{$p->data_limite}}</td>
                                  <td><a href="/premio/resgatar/{{$p->id}}" class="btn btn-primary btn-fill">Resgatar</a></td>
                              </tr>
                          </thead>	    
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
		@else
		<p>Não existe premios disponiveis</p>
	@endif


<div class="modal fade" id="meusPremios" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Premios</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if($premiacao != null)
                <div class="table-responsive-xl">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>         
                            <th scope="col">Titulo</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Prazo de inscrição</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($premiacao as $prem)
                        @if($prem->user_id == $user->id)
                            @foreach($premios as $p)
                                @if($p->id == $prem->premio_id)
                                    <thead>
                                        <tr>
                                            <th scope="row"><td >{{$p->titulo}}</td></th> 
                                            <td ><p>{{$p->descricao}}</p></td>
                                            <td >{{$p->valor}}</td>
                                            <td >{{$p->data_limite}}</td>
                                            <td><a href="/premio/cancelarInscricao/{{$p->id}}" class="btn btn-primary btn-fill">Cancelar inscrição</a></td>
                                        </tr>
                                    </thead>	    
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <!--alerta-->
                <p>Não existe premios disponiveis</p>
            @endif           
            
        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
  </div>
</div>


 @section('scripts')
      <script>
            
            $('#modalEditar').on('show.bs.modal', function (event) {
            var premio = $(event.relatedTarget)
            var user = premio.data    
            
      })
      </script>
  @endsection
	
@endsection
