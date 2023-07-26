@include('backEnd.admin_head');
<div class="wrapper">
  <!-- Navbar -->
  @include('backEnd.admin_nav');
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backEnd.admin_said');

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        {{-- <div class="row mb-2"> --}}
        <section class="container">

          @yield('content')
            

         </section>
          {{-- <div class="col-sm-6">

          </div><!-- /.col --> --}}
        {{-- </div><!-- /.row --> --}}
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('backEnd.admin_footer');
