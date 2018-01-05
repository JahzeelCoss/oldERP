@extends('layouts.base')
@section('body')
  
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if ($errors->has())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          {!! $error !!}<br>
        @endforeach
      </div>
       @endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Usuarios
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="#"> Administración de Usuarios</a></li>
                <li class="active">Agregar Usuario</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <h1 class="page-header">
                Agregar un Usuario a la Tarea
              </h1>
            </div>  
          </div>
          
          <div class="row">
             <div class="col-xs-12 col-sm-9">
              <table class="table table-condensed">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 200px">Nombre</th>                      
                  <th>Agregar</th>
                </tr>
                 @if ($contador = 1) @endif
                @foreach($task->possibleUsers() as $user)
                   <tr>
                    <td>{!! $contador !!}</td>
                    <td><a href="{{ URL::to('users/' . $user->id) }}">{!! $user->first_name !!} {!! $user->last_name !!}</a></td>                       
                    <td>
                      {!! Form::open(array('url' => 'tasks/' . $task->id . '/addUser')) !!}
                      {!! Form::hidden('user_id', $user->id) !!}                      
                      {!! Form::submit('Añadir', array('class' => 'btn btn-xs btn-danger',)) !!}              
                      {!! Form::close() !!}  
                    </td>
                  </tr>
                  @if ($contador++) @endif
                @endforeach                          
              </tbody>
             </table>
            </div>      

          </div>
            
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->





@stop