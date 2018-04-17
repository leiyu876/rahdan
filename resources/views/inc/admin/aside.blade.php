<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('custom_adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Fatora Mastoda</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('invoices/create') }}"><i class="fa fa-circle-o"></i> Create Fatora</a></li>
          <li><a href="{{ route('invoices.warehouse', ['action_code'=>'unfinish']) }}"><i class="fa fa-circle-o"></i> Unfinish ( Bagi )</a></li>
          <li><a href="{{ route('invoices.warehouse', ['action_code'=>'finished_confirm']) }}"><i class="fa fa-circle-o"></i> Finished ( Kalas )</a></li>
          <li><a href="{{ route('invoices.warehouse', ['action_code'=>'returned_confirm']) }}"><i class="fa fa-circle-o"></i> Returned ( Radja )</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Fatora</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('invoices') }}"><i class="fa fa-circle-o"></i> Fatora List</a></li>
          <li><a href="{{ url('invoices/unfinish') }}"><i class="fa fa-circle-o"></i> Unfinish ( Bagi )</a></li>
          <li><a href="{{ url('invoices/finish') }}"><i class="fa fa-circle-o"></i> Salesman Finish ( Kalas )</a></li>
          <li><a href="{{ url('invoices/return') }}"><i class="fa fa-circle-o"></i> Salesman Return ( Radja )</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i> Users List</a></li>
          <li><a href="{{ url('users/create') }}"><i class="fa fa-circle-o"></i> Create User</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Fatora Actions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('actions') }}"><i class="fa fa-circle-o"></i> Action List</a></li>
          <li><a href="{{ url('actions/create') }}"><i class="fa fa-circle-o"></i> Create Action</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
