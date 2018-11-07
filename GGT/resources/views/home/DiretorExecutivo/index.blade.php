@extends('layout.principal')
@section('title', 'Home')

@section('conteudo')

    <style>
        .title-inline{
            /* display: inline-block; */
        }

        .task-header .div-right{
            text-align: right;
        }

        .task-header .div-right button i {            
            font-size: 16px;
            font-weight: 800;
        }

        
    </style>

    <div class="container">
        <div class=row>
            <div class="col-md">
                <div class="card card-task">
                    <div class="card-header task-header">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Tarefas para Avaliar</h4>
                            </div>
                            <div class="col div-right">
                                <button class="btn btn-primary btn-sm btn-fill" title="Criar nova tarefa"><i class="nc-icon nc-simple-add"></i> <i class="nc-icon nc-notes"></i></button>
                            </div> 
                        </div>
                                          
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    @foreach($user->tarefasParaAvaliar() as $t)
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
        </div>
    </div>

@endsection