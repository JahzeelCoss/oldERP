@extends('layouts.base')
@section('body')
  
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @if ($errors->has())
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
              {!! $error !!}<br>
            @endforeach
          </div>
        @endif

        <section class="content-header">
            <h1>
            Dashboard
            <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="#"><i></i> Tareas</a></li>
                <li class="active">Crear/editar</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">
              <h1 class="page-header">
                 @if(isset($data['task']))
                    Editar una Tarea
                @else
                    Crear una Tarea
                @endif 
              </h1>
            </div>  
          </div>
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Información De La Tarea</h3>
                  </div><!-- /.box-header -->         
                    <div class="box-body">            
                      @if(isset($data['task']))
                      {!!Form::model($data['task'], array('url'=>'tasks/'.$data['task']->id, 'method'=>'PUT'))!!}
                      @elseif(isset($data['task_id']))
                      {!!Form::open(array('url'=>'tasks/'.$data['task_id'].'/storeSubtask'))!!}
                      @else
                      {!!Form::open(array('url' => 'tasks'))!!}
                      @endif
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                          @if(isset($data['project_id']))
                            <input type="hidden" name="project_id" value="{{ $data['project_id'] }}" />                         
                          @else 
                             <input type="hidden" name="project_id" value="{{ $data['task']->project_id }}" />
                          @endif                                                  
                        <label for="name">Nombre</label>
                        {!! Form::text('name', old('name'), array('class'=>'form-control', 'placeholder'=>'Nombre',
                          'required'=>'true', 'id'=>'name')) !!}            
                        <label for="description">Descripción</label>
                        {!! Form::text('description', old('description'), array('class'=>'form-control', 'placeholder'=>'Descripción','id'=>'description')) !!}
                        <label for="taskname">Fecha planeada de comienzo</label>
                        {!! Form::date('planed_starting_date', null, array('class'=>'form-control','id'=>'planed_starting_date', 'required'=>'true')) !!}    
                         <label for="taskname">Fecha planeada de Término</label>
                        {!! Form::date('planed_ending_date', null, array('class'=>'form-control','id'=>'planed_ending_date', 'required'=>'true')) !!}                                       
                        @if(isset($data['task']))
                                    
                        @else      
                         <label for="status_name"><b>[---Estado de la Tarea---] </b></label><br>     
                         {!! Form::select('status_name', $data['status'], '0') !!}        
                        @endif
                                                    
                    </div><!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                          @if(isset($task))
                            Editar
                          @else
                            Crear
                          @endif               
                        </button>
                      </div>
                    {!! Form::close() !!}    
                </div><!-- /.box -->   
              </div><!-- left column -->  
            
              @if(isset($data['task']))
              <!-- right column -->
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-warning">
                  <div class="box-header with-border">
                    <h3 class="box-title">Información Adicional</h3>
                  </div><!-- /.box-header -->         
                    <div class="box-body">      
                      {!!Form::model($data['task'], array('url' => 'tasks/' . $data['task']->id . '/addInfo', 'action' => 'taskController@addInfo' ))!!}                       
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />                                 
                        <label for="started_date">Fecha de comienzo</label>
                        {!! Form::date('started_date', null, array('class'=>'form-control','id'=>'planed_starting_date', 'required'=>'true')) !!}    
                         <label for="finished_date">Fecha de Término</label>
                        {!! Form::date('finished_date', null, array('class'=>'form-control','id'=>'planed_ending_date', 'required'=>'true')) !!}     
                        <label for="status_name"><b>[---Estado del proyecto---] </b></label><br>               
                          @if(is_null($data['task']->status))
                            Aun no tiene un Estado Asignado<br>
                          @else
                            Estado Actual: 
                            {!! $data['task']->status->name !!}<br>
                          @endif                                   
                        {!! Form::select('status_name', $data['status'], '0') !!}                                 
                    </div><!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                      </div>
                    {!! Form::close() !!}    
                </div><!-- /.box -->   
              </div>
              @endif


            </div><!-- /.row -->   


          </section><!-- End Main content -->
            
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->





@stop

