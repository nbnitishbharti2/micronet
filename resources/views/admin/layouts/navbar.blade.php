<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin/home') }}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">  
      <li class="dropdown dropdown-user">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <img alt="" class="img-circle" src="{{ url('public/dist/img/user3-128x128.jpg') }}"/>
            <span class="username username-hide-on-mobile">{{ Auth::guard('admin')->user()->name }} </span>
          </a>
          <ul class="dropdown-menu dropdown-menu-default pull-left">
            <li class="user-menu-pull-left">
              <i class="fas fa-user"></i>
              <a href="{{ route('admin.showProfile') }}"> <i class="icon-key"></i>Profile</a>
            </li>
            <li class="user-menu-pull-left">
              <i class="fas fa-key"></i>
              <a href="{{route('admin.auth.changepassword')}}"> <i class="icon-key"></i>Change Password</a>
            </li>
            <li class="user-menu-pull-left">
              <i class="fas fa-sign-out-alt"></i>
              <a href="{{ route('admin.auth.logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="icon-key"></i>{{ __("Log Out") }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin/home') }}" class="brand-link">
      <img src="{{ asset('public/images/b-logo.png') }}" alt="Banane Wala" class="brand-image img-circle elevation-3"
           style="opacity: 1">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('public/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/admin/home') }}" class="d-block"> {{ Auth::guard('admin')->user()->name }} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @include('admin.layouts.superadmin-sidebar') 
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>