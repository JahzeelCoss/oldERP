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
            Usuarios           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>            
            <li class="active">Usuarios</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="container">
			<div class="col-md-3">
				<h1 class="page-header">Todos los Usuarios</h1>
			</div>
			<div class="col-md-6">
				<button type="button" class="sou-location btn btn-primary btn-default" data-toggle="modal" data-target="#modal-sou-location">
					<span class="glyphicon glyphicon-plus"></span> Añadir un nuevo Usuario
				</button>
			</div>
		</div>

		<table class="table table-condensed table-striped table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre(s)</th>
					<th>Apellido(s)</th>
					<th>Nombre de Usuario</th>
					<th>Email</th>
					<th>Estado</th>			
				</tr>
			</thead>
			<tbody>
			@if(!empty($users) && isset($users))
				@foreach ($users as $user)
					<tr>
						<td>{!!$user->id!!}</td>
						<td>{!!$user->first_name!!}</td>
						<td>{!!$user->last_name!!}</td>
						<td>{!!$user->username!!}</td>
						<td>{!!$user->email!!}</td>
						<td>
							@if($user->active)
								Activo
							@else
								Desactivado
							@endif					
						</td>
						<td>											
							<!-- edit this user (uses the edit method found at GET /user/{id}/edit -->
		                	<a class="sou-location btn btn-xs btn-warning" href="{{ URL::to('users/' . $user->id . '/edit') }}"><span class="glyphicon glyphicon-plus"></span> Editar</a>		
						</td>			
						<td>
							
							{!! Form::open(array('url' => 'users/' . $user->id . '/cambiarEstado', 'class' => 'pull-right', 'action' => 'UserController@cambiarEstado' )) !!}                    
		                    @if ($user->active)
								{!! Form::submit('Desactivar', array('class' => 'btn btn-xs btn-danger',)) !!}		
							@else
								{!! Form::submit('Activar', array('class' => 'btn btn-xs btn-danger',)) !!}		
							@endif                    
		                	{!! Form::close() !!}
		                	{{-- <button data-id="{!!$user->id!!}" type="button" class="delete-user btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete-user">
								<span class="glyphicon glyphicon-plus"></span> Eliminar
							</button> --}}
						</td>
						<td>						
							{!! Form::open(array('url' => 'users/' . $user->id, 'class' => 'pull-right' )) !!}
		                    {!! Form::hidden('_method', 'DELETE') !!}                   
							{!! Form::submit('Eliminar', array('class' => 'btn btn-xs btn-danger',)) !!}		          
		                	{!! Form::close() !!}                	
						</td>
					</tr>
				@endforeach
			@endif
			</tbody>
		</table>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@stop

<div class="modal fade" id="modal-sou-location" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Añadir un nuevo Usuario</h4>
			</div>
			{!! Form::open(array('url'=>'users', 'id'=>'sou-form')) !!}
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<input class="form-control" type="hidden" id="userId" name="id">
					<label for="first_name">Nombre(s)</label>
					{!! Form::text('first_name', null, array('class'=>'form-control', 'placeholder'=>'Nombre(s)',
						'required'=>'true', 'id'=>'first_name')) !!}
					<label for="last_name">Apellido(s)</label>
					{!! Form::text('last_name', null, array('class'=>'form-control', 'placeholder'=>'Apellido(s)',
						'id'=>'last_name')) !!}
					<label for="email">email</label>
					{!! Form::text('email', null, array('class'=>'form-control', 'required'=>'true', 'id'=>'email','placeholder'=>'Email')) !!}					
					<label for="password">Contraseña</label>					 
					 {!! Form::password('password', array('class'=>'form-control', 'required'=>'true', 'id'=>'password', 'placeholder'=>'Contraseña')) !!}			
					<label for="password_confirmation">Confirmar Contraseña</label>
					{!! Form::password('password_confirmation', array('class'=>'form-control', 'required'=>'true', 'id'=>'password_confirmation', 'placeholder'=>'Confirmar Contraseña')) !!}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button class="btn btn-success" type="submit">Añadir</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>


