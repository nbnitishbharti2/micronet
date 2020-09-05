<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
     <li class="nav-item has-treeview menu-open">
      <a href="{{ url('/admin/home') }}" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
      </a>
    </li> 
  
    <li class="nav-item has-treeview">
      <a href="{{ route('admin.view.services') }}" class="nav-link">
        <i class="fas fa-cogs"></i>
        <p> 
          Services
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="{{ route('admin.view.gallery') }}" class="nav-link">
        <i class="fas fa-cogs"></i>
        <p> 
          Gallery
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
    </li>
 
    <li class="nav-item has-treeview">
      <a href="{{ route('admin.view.setting') }}" class="nav-link">
        <i class="fas fa-cogs"></i>
        <p> 
          Setting
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
    </li>

     
  </ul>
</nav>