@extends('layouts.base')
@section('head')  
@parent 
  <link href="{{ asset('/plugins/jRange-master/jquery.range.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('body')


	
	<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Test De Personalidad            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Recursos Humanos</a></li>
            <li class="active">Test de Personalidad</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box box-solid">
            <div class="box-header with-border">
            	<div class="page-header">
    				  <h1 class=""><strong>TOMAR EL TEST </strong><i class="fa fa-check-square-o"></i></h1>   
    				</div>                         
            </div>
            <div class="box-body">
              <h4><i class="fa fa-circle"></i> Responda honestamente cada una de las siguientes preguntas</h4>
              <h4><i class="fa fa-circle"></i> Coloque que tan deacuerdo se siente con cada oración, donde 1 es "totalmente en desacuerdo" y 5 es "totalmente de acuerdo"</h4>
              <p><hr></p>
                <div class="col-md-8 col-md-offset-2">
                  <div class="panel panel-warning">
                    <div class="panel-heading"> 
                      <h3 class="panel-title">
                        1.-You find it easy to introduce yourself to other people.
                      </h3>
                    </div>
                    <div class="panel-body text-center">
                      <p><span class="label label-default pull-left">En Desacuerdo</span><span class="label label-default pull-right">De acuerdo</span></p>
                      <p><hr></p>
                      <div class="col-md-offset-2">
                        <input type="hidden" class="slider-input single-slider text-center" value="3" id="single-slider"/>  
                      </div>                                           
                    </div>
                  </div>
                  <div class="panel panel-warning">
                    <div class="panel-heading"> 
                      <h3 class="panel-title">
                        2.-You find it easy to introduce yourself to other people.
                      </h3>
                    </div>
                    <div class="panel-body text-center">
                      <p><span class="label label-default pull-left">En Desacuerdo</span><span class="label label-default pull-right">De acuerdo</span></p>
                      <p><hr></p>
                     <div class="col-md-offset-2">
                        <input type="hidden" class="slider-input single-slider text-center" value="3" id="single-slider"/>  
                      </div>                       
                    </div>
                  </div>
                  <div class="panel panel-warning">
                    <div class="panel-heading"> 
                      <h3 class="panel-title">
                        3.-You find it easy to introduce yourself to other people.
                      </h3>
                    </div>
                    <div class="panel-body text-center">
                      <p><span class="label label-default pull-left">En Desacuerdo</span><span class="label label-default pull-right">De acuerdo</span></p>
                      <p><hr></p>
                      <div class="col-md-offset-2">
                        <input type="hidden" class="slider-input single-slider text-center" value="3" id="single-slider"/>  
                      </div>                       
                    </div>
                  </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer text-center">
              <button type="button" class="btn btn-danger btn-lg">Siguiente <i class="fa  fa-chevron-right"></i></button>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

@stop 

@section('js')
  @parent 
    <script src="{!! asset('/plugins/jRange-master/jquery.range.js') !!}"></script>
    <script type="text/javascript">
      $('.single-slider').jRange({
        from: 1,
        to: 5,
        step: 1,
        scale: [1,2,3,4,5],
        format: '%s',
        width: 450,
        showLabels: true
    });
    </script>
@stop