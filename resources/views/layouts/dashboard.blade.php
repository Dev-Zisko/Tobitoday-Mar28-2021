<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>TobiToday | Envía remesas fácil y rápido</title>
  <link rel="icon" href="{{ url('assetsDashboard/images/favicon.ico') }}">
  <!-- Custom fonts for this template-->
  <link href="{{ url('assetsDashboard/vendor2/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ url('assetsDashboard/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul style="background: #282828;" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img style="width: 35%; height: 35%;" src="{{ url('assetsDashboard/images/logotransparent.png') }}">TobiToday
        </div>
        <div class="sidebar-brand-text mx-3"></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div style="color: white; text-align: center; margin-top: 3px;" class="sidebar-heading">
        Opciones:
      </div>

      @if(Auth::user()->role == "Administrador")

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('usuarios') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Admin. Usuarios</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('remesas') }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Estatus de Remesas</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('tasa-del-dia') }}">
            <i class="fas fa-fw fa-percentage"></i>
            <span>Admin. Tasa del Día</span>
          </a>
        </li>
      
      @elseif(Auth::user()->role == "Usuario")
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('mis-beneficiarios') }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Mis Beneficiarios</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('lista-remesas') }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Lista de remesas enviadas</span>
          </a>
        </li>

      @endif

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav style="background: #FF6723 !important;" class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button style="background: #E0E0E0;" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i style="color: #FF6723;" class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style="color: white !important;" class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
                <img class="img-profile rounded-circle" src="{{ url('assetsDashboard/images/avatar.jpg') }}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                @if(Auth::user()->role == "Usuario")
                <a class="dropdown-item" href="{{route('editar-perfil')}}">
                <i class="fas fa-user-circle fa-sm fa-fw mr-2"></i>Mi perfil</a>
                @endif
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>Salir</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">

            @yield('head-content')
            
          </div>

          @yield('content')
    
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span id="copyrightDate">Copyright &copy; TobiToday </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  @yield('scripts')
  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('assetsDashboard/vendor2/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('assetsDashboard/vendor2/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('assetsDashboard/js/sb-admin-2.min.js') }}"></script>

  <script type="text/javascript">
      date = new Date();
      copyrightDate = date.getFullYear();
      $('#copyrightDate').append(copyrightDate);
  </script>

</body>

</html>