@extends('layout.principal')
@section('title', 'Home')

@section('conteudo')

    <nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	    <!-- <li class="breadcrumb-item active" aria-current="page">Tarefas</li> -->	    
	  </ol>
	</nav>

    <div class="container">
        <div class=row>
            <div class="col-md-6">

                <div class="card card-task">
                    <div class="card-header">
                        <h4 class="card-title">Tarefas a Concluir</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-full-width">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Tarefa</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection