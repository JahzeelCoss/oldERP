<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    @section('head')        
        <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bappscorp | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
        <!-- Theme style -->
        <link href="{{ asset('/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="{{ asset('/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="{{ asset('/plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="{{ asset('/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="{{ asset('/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />       
        <!-- Daterange picker -->
        <link href="{{ asset('/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('/dist/css/custom.css') }}" rel="stylesheet" type="text/css" />
          <!-- Date Picker -->
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    @show
</head>

<body class="skin-blue"> {{-- la copia del skin-blue esta en el archivo skin-blue2 --}}
        <div class="wrapper">
            @include('layouts.header')
            @include('layouts.sidebar')
            @include('layouts.rightbar')
            
            @yield('body')
            
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.0
                </div>
                 <strong>Copyright &copy; 2015 <a href="http://bappscorp.com">Bappscorp</a>.</strong> All rights reserved.
            </footer>
        </div><!-- ./wrapper -->
    
    @section('js')
        <!-- jQuery 2.1.4 -->
        <script src="{!! asset('/plugins/jQuery/jQuery-2.1.4.min.js') !!}"></script>
        <!-- jQuery UI 1.11.4 -->
        <!--  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>-->
        
         <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button);
        </script>
         <script src="{{ asset('/plugins/bootstrap-datepicker/moment.min.js') }}" type="text/javascript">
         </script>
        <!-- Bootstrap 3.3.5 -->

        <script src="{!! asset('/bootstrap/js/bootstrap.min.js') !!}"></script>

        <!-- tablas -->
            <!-- Morris.js charts -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
            <script src="{!! asset('/plugins/morris/morris.min.js') !!}"></script>
             <!-- Sparkline -->
            <script src="{!! asset('/plugins/sparkline/jquery.sparkline.min.js') !!}"></script>

        <!-- mapa --> 
            <!-- jvectormap -->
            <script src="{!! asset('/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}"></script>
            <script src="{!! asset('/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}"></script>

        <!-- calendario -->
            <!-- jQuery Knob Chart -->
            <script src="{!! asset('/plugins/knob/jquery.knob.js') !!}"></script>
             <!-- daterangepicker -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
            <script src="{!! asset('/plugins/daterangepicker/daterangepicker.js') !!}"></script>            

            <!-- Bootstrap WYSIHTML5 -->
            <script src="{!! asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}"></script>
            <!-- Slimscroll -->
            <script src="{!! asset('/plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
            <!-- FastClick -->
            <script src="{!! asset('/plugins/fastclick/fastclick.min.js') !!}"></script>
            <!-- AdminLTE App -->
            <script src="{!! asset('/dist/js/app.min.js') !!}"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="{!! asset('/dist/js/pages/dashboard.js') !!}"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="{!! asset('/dist/js/demo.js') !!}"></script>

            <!-- datepicker -->
             <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js">
             </script>  
    @show     
</body>

</html>