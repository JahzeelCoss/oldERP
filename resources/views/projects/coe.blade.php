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
                <li><a href="#"><i></i> Proyectos</a></li>
                <li class="active">Crear/Editar</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">
              <h1 class="page-header">
                 @if(isset($data['project']))
                    Editar un Projecto
                @else
                    Crear un Projecto
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
                    <h3 class="box-title">Información Del Proyecto</h3>
                  </div><!-- /.box-header -->         
                    <div class="box-body">            
                      @if(isset($data['project']))
                      {!!Form::model($data['project'], array('url'=>'projects/'.$data['project']->id, 'method'=>'PUT'))!!}
                      @else
                      {!!Form::open(array('url' => 'projects'))!!}
                      @endif
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <label for="name">Nombre</label>
                        {!! Form::text('name', old('name'), array('class'=>'form-control', 'placeholder'=>'Nombre',
                          'required'=>'true', 'id'=>'name')) !!}            
                        <label for="description">Descripción</label>
                        {!! Form::text('description', old('description'), array('class'=>'form-control', 'placeholder'=>'Descripción','id'=>'description')) !!}
                        <label for="projectname">Fecha planeada de comienzo</label>
                        {!! Form::date('planed_starting_date', null, array('class'=>'form-control','id'=>'planed_starting_date', 'required'=>'true')) !!}    
                         <label for="projectname">Fecha planeada de Término</label>
                        {!! Form::date('planed_ending_date', null, array('class'=>'form-control','id'=>'planed_ending_date', 'required'=>'true')) !!}                                       
                        @if(isset($data['project']))
                                    
                        @else      
                         <label for="status_name"><b>[---Estado del proyecto---] </b></label><br>     
                         {!! Form::select('status_name', $data['status'], '0') !!}        
                        @endif
                                                    
                    </div><!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                          @if(isset($project))
                            Editar
                          @else
                            Crear
                          @endif               
                        </button>
                      </div>
                    {!! Form::close() !!}    
                </div><!-- /.box -->   
              </div><!-- left column -->  
            
              @if(isset($data['project']))
              <!-- right column -->
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-warning">
                  <div class="box-header with-border">
                    <h3 class="box-title">Información Adicional</h3>
                  </div><!-- /.box-header -->         
                    <div class="box-body">      
                      {!!Form::model($data['project'], array('url' => 'projects/' . $data['project']->id . '/addInfo', 'action' => 'ProjectController@addInfo' ))!!}                       
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <label for="repository_link">Link al Repositorio</label>
                        {!! Form::text('repository_link', old('repository_link'), array('class'=>'form-control', 'placeholder'=>'Link',
                          'required'=>'true', 'id'=>'name')) !!}            
                        <label for="started_date">Fecha de comienzo</label>
                        {!! Form::date('started_date', null, array('class'=>'form-control','id'=>'planed_starting_date', 'required'=>'true')) !!}    
                         <label for="finished_date">Fecha de Término</label>
                        {!! Form::date('finished_date', null, array('class'=>'form-control','id'=>'planed_ending_date', 'required'=>'true')) !!}     
                        <label for="status_name"><b>[---Estado del proyecto---] </b></label><br>               
                          @if(is_null($data['project']->status))
                            Aun no tiene un Estado Asignado<br>
                          @else
                            Estado Actual: 
                            {!! $data['project']->status->name !!}<br>
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

