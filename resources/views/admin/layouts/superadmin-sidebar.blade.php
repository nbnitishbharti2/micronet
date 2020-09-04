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
      <a href="#" class="nav-link">
        <i class="fas fa-city"></i>
        <p> 
          State
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.view.state') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>State</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.view.city') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>City</p>
          </a>
        </li>
        
      </ul>
    </li>


    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="fas fa-bars"></i>
        <p> 
          Category
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.view.type') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Type</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.view.category') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Category</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.view.sub-category') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Sub Category</p>
          </a>
        </li>
      </ul>
    </li>


    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="fas fa-clipboard-list"></i>
        <p> 
          Service
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.view.service') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Service</p>
          </a>
        </li>   
        <li class="nav-item">
          <a href="{{ route('admin.view.service-description') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Service Description</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.view.service-plan') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Service Plan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.view.price-by-city') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Price By City</p>
          </a>
        </li>  
      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="{{ route('admin.view.partner') }}" class="nav-link">
        <i class="fas fa-user"></i>
        <p> 
          Partner
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="fas fa-bars"></i>
        <p> 
          Orders
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.new-orders') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>New Orders</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.orders') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Orders</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.completed-orders') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Completed Orders</p>
          </a>
        </li>

      </ul>
    </li>


    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="fas fa-file-invoice"></i>
        <p> 
          Transactions
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.transactions') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Transactions</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.unsettled-transactions') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Unsettled Transactions</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.getAllSettleTransactions') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Settle Transactions</p>
          </a>
        </li>

      </ul>
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