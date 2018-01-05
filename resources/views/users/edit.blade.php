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
            Editar Usuario           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Usuarios</a></li>
            <li class="active">Editar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="container">
            <div class="col-md-3">
              <h1 class="page-header">Editar un usuario</h1>
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
                    <h3 class="box-title">Información Principal</h3>
                  </div><!-- /.box-header -->         
                    <div class="box-body">
                      {!!Form::model($user, array('url'=>'users/'.$user->id, 'method'=>'PUT'))!!}
                      <!-- {!! Form::open(array('url' => 'users/' . $user->id, 'class' => 'pull-right' )) !!}              -->
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <label for="first_name">Nombre(s)</label>
                        {!! Form::text('first_name', null, array('class'=>'form-control', 'required'=>'true', 'id'=>'first_name')) !!}
                        <label for="last_name">Apellido(s)</label>
                        {!! Form::text('last_name', null, array('class'=>'form-control', 'id'=>'last_name')) !!}
                        <label for="username">Nombre De Usuario</label>
                        {!! Form::text('username', null, array('class'=>'form-control', 'id'=>'username')) !!}
                        <label for="email">email</label>
                        {!! Form::text('email', null, array('class'=>'form-control', 'required'=>'true', 'id'=>'email')) !!}
                        <br>
                        <b>[---CAMBIAR CONTRASEÑA---] </b>
                        <br>        
                        <label for="password">Contraseña</label>           
                         {!! Form::password('password', array('class'=>'form-control', 'id'=>'password', 'placeholder'=>'Contraseña')) !!}      
                        <label for="password_confirmation">Confirmar Contraseña</label>
                        {!! Form::password('password_confirmation', array('class'=>'form-control', 'id'=>'password_confirmation', 'placeholder'=>'Confirmar Contraseña')) !!}                                             
                    </div><!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    {!! Form::close() !!}    
                </div><!-- /.box -->   
              </div>
            </div>


          </section><!-- End Main content -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->






@stop

