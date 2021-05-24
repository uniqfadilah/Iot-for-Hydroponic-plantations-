<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('head')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link"></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
 
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">Admin</span>
          <div class="dropdown-divider"></div>
        <a href="/logout" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> logout
          </a>
      </li>
   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Kebun Cimacan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
      @if(auth()->user()->role=='admin')
        <div class="image">
          <img src="{{url('dist/img/user1-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
      @else
      <div class="image">
          <img src="{{url('dist/img/pekerja/'.auth()->user()->penanggungjawab['gambar'])}}" class="img-circle elevation-2" alt="User Image">
        </div>
      @endif
        @if(auth()->user()->role=='admin')
        <div class="info">
          <a href="#" class="d-block">KEPALA KEBUN</a>
        </div>
        @else
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->penanggungjawab['nama']}}</a>
        </div>
        @endif
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/dashboard" class="nav-link" >
              <i class="nav-icon fa fa-leaf"></i>
              <p>
                Dashboard  
              </p>
            </a>
          </li>
          @if(auth()->user()->role=='admin')
          <li class="nav-item">
            <a href="{{url('/greenhouse')}}" class="nav-link @yield('greenhouse')">      
              <i class="nav-icon fas fa-home"></i>
              <p>
                Green House
              </p>
            </a>
          </li>
          @else
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                greenhouse
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            @foreach(auth()->user()->penanggungjawab['greenhouse'] as $gh)
            @if($gh->status=='1')
            <ul class="nav nav-treeview">
              <li class="nav-item">
            
                <a href="/rumahkaca/{{$gh->id}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                
                  <p>{{$gh->kode}}</p>
                
                </a>
              </li>
            </ul>
            @endif
            @endforeach
          </li>
          @endif
          @if(auth()->user()->role=='admin')
          <li class="nav-item">
            <a href="http://kebuncimacan.ddns.eagleeyes.tw/" class="nav-link"  target="_blank">
              <i class="nav-icon fa fa-video"></i>
              <p>
                CCTV    
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview @yield('laporan')">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-exclamation-circle"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/hasilpanen')}}" class="nav-link @yield('hasilpanen')">
                  <i class="fa fa-poll nav-icon"></i>
                  <p>Hasil Panen</p>
                </a>
              </li>
              <li class="nav-item has-treeview @yield('alat')">
                  <a href="#" class="nav-link ">
                    <i class="fa fa-tools nav-icon"></i>
                    <p>
                      Alat dan Nutrisi
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{url('/lkipas')}}" class="nav-link @yield('lkipas')">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Kipas</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('/llampu')}}" class="nav-link @yield('llampu')">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Lampu</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('/lnutrisi')}}" class="nav-link @yield('lnutrisi')">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Nutrisi</p>
                      </a>
                    </li>
                  </ul>
                </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @yield('kelola')">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/datasayur')}}" class="nav-link @yield('datasayur')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sayuran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/newgreenhouse')}}" class="nav-link @yield('newgh')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Greenhouse</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/pegawai')}}" class="nav-link @yield('pegawai')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dmkipas')}}" class="nav-link @yield('kipas')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kipas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dmlampu')}}" class="nav-link @yield('lampu')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lampu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dmtermo')}}" class="nav-link @yield('termo')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Termometer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dmlux')}}" class="nav-link @yield('lux')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Luxmeter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dmtandon')}}" class="nav-link @yield('tandon')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tandon</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dmpompa')}}" class="nav-link @yield('pompa')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pompa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dmpompa')}}" class="nav-link @yield('user')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li>
          </ul>
          </li>
          @endif
        </ul>
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <div class="container-fluid">
     
    @yield('container')
 
  </div>
<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('dist/js/adminlte.js')}}"></script>
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{url('dist/js/demo.js')}}"></script>
<!-- AdminLTE for demo purposes -->
@yield('foot')
</body>
</html>

