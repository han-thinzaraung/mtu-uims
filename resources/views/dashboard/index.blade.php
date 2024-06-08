<!DOCTYPE html>
<html lang="en">
<head>
    @include('dashboard.header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/Logo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/Logo.png ')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MTU - UIMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/profile.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(auth()->user()->role == '0' || auth()->user()->role == '1')
          <li class="nav-item menu-open">
            <a href="{{ route('year.create') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Create Academic Year
              </p>
            </a>
          @endif
           
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('year.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Academic Year List
              </p>
            </a>
          @if(auth()->user()->role == '0' || auth()->user()->role == '1')
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('department.create') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Create Department 
              </p>
            </a>
          @endif
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('department.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Department List
              </p>
            </a>
          @if(auth()->user()->role == '0' || auth()->user()->role == '1')
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('user.create') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Create User 
              </p>
            </a>
            @endif
           
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('user.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
               User List
              </p>
            </a>
          </li>

          @if(auth()->user()->role == '0' || auth()->user()->role == '1')
          <li class="nav-item menu-open">
            <a href="{{ route('score.create') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Create Admission Score
              </p>
            </a>
            @endif
           
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('score.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Admission Score List 
              </p>
            </a>
          </li>
          @if(auth()->user()->role == '0' || auth()->user()->role == '1')
          <li class="nav-item menu-open">
            <a href="{{ route('timetable.create') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Create Timetable
              </p>
            </a>
          </li>
          @endif

          <li class="nav-item menu-open">
            <a href="{{ route('timetable.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Timetable List 
              </p>
            </a>
          </li>
          @if(auth()->user()->role == '0' || auth()->user()->role == '1')
          <li class="nav-item menu-open">
            <a href="{{ route('result.create') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Create Result File
              </p>
            </a>
          </li>
          @endif

          <li class="nav-item menu-open">
            <a href="{{ route('result.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Result File List 
              </p>
            </a>
          </li>
          @if(auth()->user()->role == '0' || auth()->user()->role == '1')
          <li class="nav-item menu-open">
            <a href="{{ route('news.create') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Create News & Events
              </p>
            </a>
           @endif
           
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('news.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
               News & Events List
              </p>
            </a>
          </li>
          
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
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @extends('dashboard.footer')
</body>
</html>
