<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{!! asset('dist/img/user1-128x128.jpg') !!}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>
                @if(empty(Auth::user()->username)  || Auth::user()->username == null)
                  {!!Auth::user()->first_name!!} 
                  {!!Auth::user()->last_name!!} 
                 @else                   
                  {!!Auth::user()->username!!}  
                 @endif
              </p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">             
            <li class="header">Menú Principal</li> 
            <li class="treeview">
              <a href="#">
                <i class="fa  fa-suitcase"></i> <span>Proyectos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <!--  
                <li class="active"><a href="index.html"><i class="fa fa-circle-o text-red"></i> En progreso</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o text-green"></i> Terminados</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o text-aqua"></i> Todos</a></li>
                -->
                {{-- si es admin administar proyectos --}}
                @if(Entrust::hasRole('admin'))
                <li><a href="{{ URL::to('projects') }}"><i class="fa fa-circle-o text-yellow"></i> Administar</a></li>     
                @endif
              </ul>
            </li>
             <li class="treeview">
              <a href="{{ URL::to('users') }}">
                <i class="fa fa-users"></i>
                <span>Administrar Usuarios</span>
                <i class="fa fa-angle-right pull-right"></i>
              </a>              
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Recursos Humanos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                {{-- si es admin administar proyectos --}}
                <li class="active"><a href="{{ URL::to('humanResources/personalityTest') }}"><i class="fa fa-circle-o text-red"></i>Test de Personalidad</a></li>
                <li><a href="{{ URL::to('humanResources/curriculum') }}"><i class="fa fa-circle-o text-green"></i>Curriculum de Usuarios</a></li>           
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Finanzas</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                {{-- si es admin administar proyectos --}}
                <li class="active"><a href="{{ URL::to('finanzas/estadosGenerales') }}"><i class="fa fa-circle-o text-red"></i>Estados Generales</a></li>                       
              </ul>
            </li>
            
        </section>
        <!-- /.sidebar -->
      </aside>
