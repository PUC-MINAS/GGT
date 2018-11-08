@extends('layout.principal')
@section('title', 'Home')

@section('conteudo')

    <!-- <nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	     <li class="breadcrumb-item active" aria-current="page">Tarefas</li>
	  </ol>
	</nav> -->

    <div class="container">
        <div class=row>
            <div class="col-md-6">

                <div class="card card-task">
                    <div class="card-header">
                        <h4 class="card-title">Tarefas a Concluir</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    @foreach($user->tarefasAFazer() as $t)
                                    <tr>
                                        <td><a href="{{url('/tarefas/detalhes/'.$t->id)}}">{{$t->titulo}}</a></td>
                                        <td><a href="{{url('/tarefas/detalhes/'.$t->id)}}">{{$t->data_limite}}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
            <div class="card card-task">
                    <div class="card-header">
                        <h4 class="card-title">Tarefas para Avaliar</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    @foreach($user->tarefasParaAvaliar() as $t)
                                    <tr>
                                      <td><a href="{{url('/tarefas/avaliacao/'.$t->id)}}">{{$t->titulo}}</a></td>
                                      <td><a href="{{url('/tarefas/avaliacao/'.$t->id)}}">{{$t->data_limite}}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
