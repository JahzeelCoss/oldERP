@extends('layouts.base')
@section('head')
	@parent 	
    
    <link rel="stylesheet" href="../plugins/carousel/carousel.css">

@stop
@section('body')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

			 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Regiones        
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Mapas</a></li>
            <li class="active">todos</li>
          </ol>
        </section>

		<!-- Main content -->
        <section class="content">
			<div id="masterhead">
				<div class="container">
					<div class="slideshow">
						<div id="slideshow" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<img class="img-responsive" src="{{ asset('dist/img/maps/mapa1.jpg') }}" alt="First Slide">
									<div class="container">
										<div class="carousel-caption">
											<h1>Regiones Principales</h1>
										</div>
									</div>
								</div><!-- /. Item Active -->
								<div class="item">
									<img class="img-responsive" src="{{ asset('dist/img/maps/mapa2.jpg') }}" alt="Second Slide">
									<div class="container">
										<div class="carousel-caption">
											<h1></h1>
										</div>
									</div>
								</div><!-- /. Item -->
								<div class="item">
									<img class="img-responsive" src="{{ asset('dist/img/maps/mapa3.jpg') }}" alt="Third slide">
									<div class="container">
										
									</div>
								</div><!-- /. Item -->
								<div class="item">
									<img class="img-responsive" src="{{ asset('dist/img/maps/mapa4.jpg') }}" alt="Forth slide">
									<div class="container">
										<div class="carousel-caption">
											<h1>
												Activos
											</h1>
										</div>
									</div>
								</div><!-- /. Item -->
							</div><!-- /. Carousel-Inner -->
							<div class="controlsBlock">
								<div class="controls">
									<a class="left carousel-control" href="#slideshow" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
									 <a class="right carousel-control" href="#slideshow" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
									<!--<a class="left carousel-control" href="#slideshow" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
									 <a class="right carousel-control" href="#slideshow" data-slide="next"><i class="fa fa-chevron-right"></i></a>-->
									<div class="carousel-indicators">
										<li data-target="#slideshow" data-slide-to="0" class="active"></li>
										<li data-target="#slideshow" data-slide-to="1"></li>
										<li data-target="#slideshow" data-slide-to="2"></li>
										<li data-target="#slideshow" data-slide-to="3"></li>
									</div>
								</div>
							</div>
						</div><!-- /# Slideshow .Carousel -->
					</div><!-- /. Slideshow -->
				</div><!-- /. Container -->
			</div><!-- /# Mastehead -->        		
        </section>

    </div><!-- /.content-wrapper -->


@stop

@section('js')
	@parent
		<script type="text/javascript">

			$('#slideshow').carousel({
	           interval: 5000
	        });
		</script>
@stop