@extends('layouts.base')
@section('body')

	<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- row -->
          <div class="row">
             <!-- Project box -->
	        <div class="box box-solid box-primary">	 
	        	<div class="box-header">
	        		<h1 class="box-title"><b>Proyectos</b></b></h1>
	                <div class="box-tools pull-right">
	                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
	                </div>
	        	</div>
	        	<div class="box-body">
	        		<div class="col-lg-3 col-xs-6">
		              <!-- small box -->
		              <div class="small-box bg-aqua">
		                <div class="inner">
		                  <h3>100<sup style="font-size: 20px">%</sup></h3>
		                  <p>Proyecto1</p>
		                </div>
		                <div class="icon">
		                  <i class="ion ion-pie-graph"></i>
		                </div>
		                <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
		              </div>
          			</div>
	          		<div class="col-lg-3 col-xs-6">
		              <!-- small box -->
		              <div class="small-box bg-green">
		                <div class="inner">
		                  <h3>60<sup style="font-size: 20px">%</sup></h3>
		                  <p>Proyecto2</p>
		                </div>
		                <div class="icon">
		                  <i class="ion ion-pie-graph"></i>
		                </div>
		                <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
		              </div>
	          		</div>
	          		<div class="col-lg-3 col-xs-6">
		              <!-- small box -->
		              <div class="small-box bg-red">
		                <div class="inner">
		                  <h3>73<sup style="font-size: 20px">%</sup></h3>
		                  <p>Proyecto3</p>
		                </div>
		                <div class="icon">
		                  <i class="ion ion-pie-graph"></i>
		                </div>
		                <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
		              </div>
	          		</div>
	          		<div class="col-lg-3 col-xs-6">
		              <!-- small box -->
		              <div class="small-box bg-yellow">
		                <div class="inner">
		                  <h3>05<sup style="font-size: 20px">%</sup></h3>
		                  <p>Proyecto4</p>
		                </div>
		                <div class="icon">
		                  <i class="ion ion-pie-graph"></i>
		                </div>
		                <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
		              </div>
	          		</div>
	        	</div> <!-- /.box body -->  
	        	<div class="box-footer text-center">
	        		<button type="button" class="btn btn-primary btn-sm pull-left"><i class="fa fa-arrow-left"></i></button>
	        		<span class="text-center"><a href=""><u>Ver Todos los Proyectos</u></a></span>
					<button type="button" class="btn btn-primary btn-sm pull-right"><i class="fa fa-arrow-right"></i></button>
	        	</div>  <!-- /.box footer -->      	
	        </div><!-- /.project box -->
          </div><!-- /.row -->

       </section>
       </div> 
@stop