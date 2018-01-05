@extends('layouts.base')
@section('body')
  
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Tareas            
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Tareas</li>
                <li class="active">{!! $task->name !!}</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            
            <!-- Info box -->
            <div class="box collapsed-box box-solid box-info">
              <div class="box-header with-border">
                <h1 class="box-title">Tarea: <b>{!! $task->name !!}</b></h1>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                @if(!empty($task->description) && isset($task->description))
                  <div class="col-xs-12">                    
                      <h3>Descripción:</h3><br>                    
                        <textarea name="" cols="45" rows="5" disabled="true">{!!$task->description!!} </textarea>         
                  </div>                  
                @endif
              </div><!-- /.box-body -->              
              <div class="box-footer">
                <a class="sou-location btn btn-xs btn-warning pull-right" href="{{ URL::to('tasks/' . $task->id . '/edit') }}"><span class="glyphicon glyphicon-plus"></span> Editar</a>
              </div><!-- /.box-footer-->
            </div><!-- /.box -->

            <!-- status box -->
            <div class="box box-success box-solid collapsed-box">
              <div class="box-header with-border ">
                <h1 class="box-title">Estado: <b>{!! $task->status->name !!}</b></h1>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body"><!-- Todos -->   
              
  
              <div class="panel panel-success col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-1">
                <div class="panel-heading">
                  <h3 class="panel-title"><strong>Fecha Planeada de Comienzo:</strong></h3>
                </div>
                <div class="panel-body">
                  <ul class="timeline">                    
                      <li class="time-label">
                        <span class="bg-green pull-right">
                          <h4>{{ $task->planed_starting_date }}</h4>
                        </span>
                      </li>             
                    </ul>
                </div>
              </div>

              <div class="panel panel-info col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-1">
                <div class="panel-heading">
                  <h3 class="panel-title"><strong>Fecha Planeada de Término:</strong></h3>
                </div>
                <div class="panel-body">
                  <ul class="timeline">                    
                      <li class="time-label">
                        <span class="bg-aqua pull-right">
                          <h4>{{ $task->planed_ending_date }}</h4>
                        </span>
                      </li>             
                    </ul>
                </div>
              </div>               

               
                @if($task->status->id == 2 || $task->status->id == 1) <!-- En progreso o Terminadas -->
                
                  <div class="panel panel-warning col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-1">
                    <div class="panel-heading">
                      <h3 class="panel-title"><strong>Fecha Real de Comienzo:</strong></h3>
                    </div>
                  <div class="panel-body">
                    <ul class="timeline">                    
                      <li class="time-label">
                        <span class="bg-yellow pull-right">
                          <h4>{{ $task->started_date }} </h4>
                        </span>
                      </li>             
                    </ul>
                  </div>
                </div>               
                  
                @endif
                @if($task->status->id == 2)<!-- Terminado -->

                  <div class="panel panel-danger col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-1">
                    <div class="panel-heading">
                      <h3 class="panel-title"><strong>Fecha Real de Término:</strong></h3>
                    </div>
                    <div class="panel-body">
                      <ul class="timeline">                    
                        <li class="time-label">
                          <span class="bg-red pull-right">
                            <h4>{{ $task->finished_date }}</h4>
                          </span>
                        </li>             
                      </ul>
                    </div>
                  </div>                  
                   
                @endif
                
              </div><!-- /.box-body -->              
              <div class="box-footer">
                <a class="sou-location btn btn-xs btn-warning pull-right" href="{{ URL::to('tasks/' . $task->id . '/edit') }}"><span class="glyphicon glyphicon-plus"></span> Editar</a>
              </div><!-- /.box-footer-->
            </div><!-- /.box -->

            <!-- TASKS box -->
            <div class="box box-warning box-solid">
              <div class="box-header with-border">
                <h1 class="box-title">Tareas: <b>{!! $task->primaryTasks->count() !!}</b></h1>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
               
               <div class="col-xs-12 col-sm-12  table-responsive">
                  <table class="table table-condensed">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 200px">Nombre</th>
                      <th>Sub-Tareas</th>
                      <th>Progreso</th>
                      <th>Porcentaje</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                     @if ($contador = 1) @endif
                    @foreach($task->primaryTasks as $task)
                       <tr>
                        <td>{!! $contador !!}</td>
                        <td><a href="{{ URL::to('tasks/' . $task->id) }}">{!! $task->name !!}</a></td>
                        <td><span class="badge bg-red">{!! $task->tasks->count() !!}</span></td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: {!! $task->progress() !!}%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green">{!! $task->progress() !!}%</span></td>
                        {{-- <td><span class="badge bg-green">90%</span></td> --}}
                        <td>
                          <a class="sou-location btn btn-xs btn-warning" href="{{ URL::to('tasks/' . $task->id . '/edit') }}"><span class="glyphicon glyphicon-plus"></span>Editar</a> 
                        </td>
                        <td>                                                  
                          {!! Form::open(array('url' => 'tasks/' . $task->id)) !!}
                          {!! Form::hidden('_method', 'DELETE') !!}                   
                          {!! Form::submit('Eliminar', array('class' => 'btn btn-xs btn-danger',)) !!}              
                          {!! Form::close() !!} 
                        </td>
                      </tr>
                      @if ($contador++) @endif
                    @endforeach                          
                  </tbody>
                </table>
                <footer>
                  <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                      <li><a href="#">«</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </footer> 
              </div>  
                
            
           <div class="panel panel-success col-xs-12">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>Resumen De Tareas</strong></h3>
            </div>
            <div class="panel-body">
                                              <!-- Donut Chart -->
                <div class="col-xs-12 col-sm-6">
                 <div id="myfirstchart" style="height: 200px;">
                                            
                 </div>
                </div>  
                <div class="col-xs-12 col-sm-6">
                 <div>
                  <ul class="nav nav-pills nav-stacked" aria-labelledby="dropdownMenuDivider">
                    <strong>
                      <p>
                        <li>
                          Por Comenzar<span class="pull-right text-red"><i class="fa fa-circle-o"></i>5</span>
                        </li>
                      </p>                    
                      <p>
                        <li>
                          En Progreso <span class="pull-right text-green"><i class="fa fa-circle-o"></i>4</span>
                        </li>
                      </p>
                      <p>  
                        <li>
                          Terminadas <span class="pull-right text-yellow"><i class="fa fa-circle-o"></i>1</span>
                        </li>                    
                      </p>          
                    
                    
                    </strong>
                  </ul>                                            
                 </div>
                </div> 
            </div>
          </div>
                                   
            
              </div><!-- /.box-body -->              
              <div class="box-footer">                     
                   <a class="sou-location btn btn-xs btn-primary pull-right" href="{!! URL::to('tasks/createSubtask/'.$task->id) !!}"><span class="glyphicon glyphicon-plus"></span> Añadir una tarea</a>                
              </div><!-- /.box-footer-->
            </div><!-- /.box -->
            
            <!-- USERS box -->
            <div class="box box-danger box-solid collapsed-box">
              <div class="box-header with-border">
                <h1 class="box-title">Integrantes: <b>{!! $task->users->count() !!}</b></h1>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="col-xs-12 col-sm-9  table-responsive">
                  <table class="table">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre</th>
                      <th>Tareas</th>
                      <th>progreso</th>
                      <th>Eliminar</th>
                    </tr>
                     @if ($contador = 1) @endif
                    @foreach($task->users as $user)
                       <tr>
                        <td>{!! $contador !!}</td>
                        <td><a href="{{ URL::to('users/' . $user->id) }}">{!! $user->first_name !!} {!! $user->last_name !!}</a></td>
                        <td><span class="badge bg-red">5</span></td>
                        <td><span class="badge bg-green">90%</span></td>
                        <td>
                          {!! Form::open(array('url' => 'tasks/' . $task->id . '/deleteUser')) !!}
                          {!! Form::hidden('deletingUser', $user->id) !!}                                     
                          {!! Form::submit('Eliminar', array('class' => 'btn btn-xs btn-danger',)) !!}              
                          {!! Form::close() !!}  
                        </td>
                      </tr>
                      @if ($contador++) @endif
                    @endforeach                          
                  </tbody>
                </table>
                </div>               
              </div><!-- /.box-body -->              
              <div class="box-footer">{!! Form::close() !!} 
               {{--  <a class="sou-location btn btn-xs btn-info pull-right" href="{!! URL::to('projects/' . $project->id . '/edit') !!}"><span class="glyphicon glyphicon-plus"></span> Añadir un Integrante</a> --}}
               <a class="sou-location btn btn-xs btn-primary pull-right" href="{!! URL::to('tasks/'.$task->id.'/addingUser') !!}"><span class="glyphicon glyphicon-plus"></span> Añadir Usuario</a>                 
                {{-- <button type="button" class="sou-location btn btn-primary btn-default pull-right" data-toggle="modal" data-target="#modal-sou-location">
                  <span class="glyphicon glyphicon-plus"></span> Añadir un nuevo Integrante
                </button> --}}
              </div><!-- /.box-footer-->
            </div><!-- /.box -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->  


@stop 

@section('js')
  @parent

  <script type="text/javascript">
  
    Morris.Donut({
    element: 'myfirstchart',
    data: [
      {label: "Terminadas", value: 1},
      {label: "Por Comenzar", value: 5},
      {label: "En Proceso", value: 4}
    ]
  });
</script>
@stop
