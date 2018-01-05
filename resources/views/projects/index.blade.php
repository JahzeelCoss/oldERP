@extends('layouts.base')
@section('body')
	
	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Proyectos</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">            
			<div class="container">
			<div class="col-md-3">
				<h1 class="page-header">Proyectos</h1>
			</div>
			<div class="col-md-6">		
				<a class="sou-location btn btn-primary btn-default" href="{{ URL::to('projects/create') }}"><span class="glyphicon glyphicon-plus"></span> Añadir un nuevo Proyecto</a>
			</div>
		</div>

		<table class="table table-condensed table-striped table-hover">
			<thead>
				<tr>					
					<th>Nombre</th>					
					<th>status</th>
					<th>Comienzo Planeado</th>
					<th>Fin Planeado</th>
					<th>Comienzo Real</th>
					<th>Fin Real</th>								
				</tr>
			</thead>
			<tbody>
			@if(!empty($projects) && isset($projects))
				@foreach ($projects as $project)
					<tr>						
						<td><a href="{{ URL::to('projects/' . $project->id) }}">{!!$project->name!!}</a></td>						
						<td>
							@if(is_null($project->status))	
							@else	
								{!!$project->status->name!!}
							@endif	
						</td>	
						{{--  --}}
						<td>{!!$project->planed_starting_date!!}</td>
						<td>{!!$project->planed_ending_date!!}</td>
						<td>{!!$project->started_date!!}</td>
						<td>{!!$project->finished_date!!}</td>										
						<td>											
							<!-- edit this project (uses the edit method found at GET /project/{id}/edit -->
		                	<a class="sou-location btn btn-xs btn-warning" href="{{ URL::to('projects/' . $project->id . '/edit') }}"><span class="glyphicon glyphicon-plus"></span> Editar</a>		
						</td>				
						<td>							   						
							{!! Form::open(array('url' => 'projects/' . $project->id . '/addInfo', 'action' => 'ProjectController@addInfo' )) !!}
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


<div class="modal fade" id="modal-delete-project" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Eliminar</h4>
			</div>
			{!! Form::open(array('url'=>'projects', 'id'=>'delete-project-form')) !!}
			{!! Form::hidden('_method', 'DELETE') !!}
			<div class="modal-body">
				<input class="form-control" type="hidden" id="projectId" name="id">
				<div class="container">
					¿Esta seguro que desea eliminar este proyecto?
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button class="btn btn-primary" type="submit">Eliminar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>

 <script type="text/javascript">

 $(document).on("click", ".delete-project", function () {
		var projectId = $(this).data('id');
		if(projectId !== null){
			$(".modal-body #projectId").val(projectId);
		}else{
			$(".modal-body #projectId").removeAttr();
		}
	});	

 $(document).on('submit','#delete-project-form', function (event){
		var projectId = $(this).find('input[name=id]').val();
		console.log(projectId);
		event.preventDefault();
		$.ajax({
			url: $(this).attr('action')+'/'+projectId,
			type: 'DELETE',
			data: $(this).serialize(),
			success: function() {
				window.location.replace("{!!url('projects')!!}");
			}
		});
	});

</script>