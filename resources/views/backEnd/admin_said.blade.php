<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('backEnd/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          {{-- <img src="{{ asset('backEnd/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block"> </a>
        </div>

      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link active">
              <p>
                Dashboard

              </p>
            </a>
          </li>


          <li class="nav-item has-treeview">
            <a href="{{ route('allresult') }}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
               result
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('allTest') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               All Test
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
