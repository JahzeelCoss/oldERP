@extends('layouts.base')
@section('body')


	<div class="content-wrapper">

		<section class="content-header">
          <h1>
            @if($data['isTheUser'])
            	Mi Perfil
            @else 
            	{{ $data['user']->first_name }} {{ $data['user']->last_name  }}
            @endif
            <small>{{ $data['user']->username }}</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Usuarios</a></li>
            <li class="active">Perfil</li>
          </ol>
        </section>

        <section class="content">

        	<div class="box box-widget widget-user">
	            <!-- Add the bg color to the header using any of the bg-* classes -->
	            <div class="widget-user-header bg-aqua-active">
	              <h3 class="widget-user-username">Alexander Pierce</h3>
	              <h5 class="widget-user-desc">Founder &amp; CEO</h5>
	            </div>
	            <div class="widget-user-image">
	              <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
	            </div>
	            <div class="box-footer">
					<div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">SALES</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">FOLLOWERS</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">PRODUCTS</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->	              
	            </div>
	            <div class="box box-solid box-info">
            		<div class="box-header with-border">
		                <h1 class="box-title">Información Principal</b></h1>
		                <div class="box-tools pull-right">
		                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
		                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		                </div>
		            </div>	
		             <div class="box-body">
			            	<b>Nombre:</b>{{ $data['user']->first_name }}<br>
			            	<b>Apellido:</b>{{ $data['user']->last_name }}<br>
			            	<b>username:</b>{{ $data['user']->username }}<br>
			            	<b>Email:</b>{{ $data['user']->email }}<br>
			            	<b>Proyectos en los que ha participado:</b>{{ $data['user']->first_name }}<br>
			            	<b>Proyectos actuales:</b>{{ $data['user']->first_name }}<br>
			            	<b>Tareas Realizadas:</b>{{ $data['user']->first_name }}<br>
			            	<b>Tareas en proceso:</b>{{ $data['user']->first_name }}<br>
			            	<ul class="nav nav-stacked">
			                    <li>
			                    	<a href="#"><b>Nombre:</b> 
			                    		<span class="pull-right badge ">
			                    			{{ $data['user']->first_name }}
			                    		</span>
			                    	</a>
			                    </li>
			                    <li>
			                    	<a href="#"><b>Apellido:</b>
			                    		<span class="pull-right badge ">
			                    			{{ $data['user']->last_name }}
			                    		</span>
			                    	</a>
			                    </li>
			                    <li>
			                    	<a href="#"><b>username:</b>
			                    		<span class="pull-right badge ">
			                    			{{ $data['user']->username }}
			                    		</span>
			                    	</a>
			                    </li>
			                    <li>
			                    	<a href="#"><b>Email:</b>
			                    		<span class="pull-right badge ">
			                    			{{ $data['user']->email }}
			                    		</span>
			                    	</a>
			                    </li>
			                   

			                    
			                 </ul>
			                 <br>
			            	@if($data['isTheUser'])
			            		<a class="btn btn-xs btn-warning pull-right" href="{{ URL::to('users/' . $data['user']->id . '/edit') }}"><span class="glyphicon glyphicon-plus"></span> Editar</a>	
			            	@endif
			         </div><!-- /.box-body -->               		
            	</div>

            	<div class="box box-solid">
            		<div class="box-header with-border">
		                <h1 class="box-title">Información Principal</b></h1>
		                <div class="box-tools pull-right">
		                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
		                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		                </div>
		              </div>	            		
            	</div>
          	</div>
        	
        </section>
	</div>


@stop