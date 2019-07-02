<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('custom_adminlte/dist/img/serious_me.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ ucwords(Auth::user()->name) }}</p>
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
      <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="treeview {{ Request::is('invoices/warehouse*') ? 'menu-open' : '' }}">
        <a href="#">
          <i class="fa fa-users"></i> <span>Argas</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="{{ Request::is('argas*') ? 'display:block' : '' }}">
          <li class="{{ Request::is('argas') ? 'active' : '' }}"><a href="{{ url('argas') }}"><i class="fa fa-circle-o"></i> Balance</a></li>
          <li class="{{ Request::is('argas/new') ? 'active' : '' }}"><a href="{{ url('argas/new') }}"><i class="fa fa-circle-o"></i> Pickslip New</a></li>
          <li class="{{ Request::is('argas/old') ? 'active' : '' }}"><a href="{{ url('argas/old') }}"><i class="fa fa-circle-o"></i> Pickslip Old</a></li>
          <li class="{{ Request::is('argas/done') ? 'active' : '' }}"><a href="{{ url('argas/done') }}"><i class="fa fa-circle-o"></i> Pickslip Done</a></li>
          <li class="{{ Request::is('argas/all') ? 'active' : '' }}"><a href="{{ url('argas/all') }}"><i class="fa fa-circle-o"></i> Display All</a></li>
        </ul>
      </li>
      @if(Auth::user()->hasRole('Super Administrator'))
        <li class="{{ Request::is('discount_compute') ? 'active' : '' }}"><a href="{{ url('discount_compute') }}"><i class="fa fa-exchange"></i> <span>Discount Compute حساب الخصم</span></a></li>
      @endif
      @if(Auth::user()->hasRole('Super Administrator'))
        <li class="treeview {{ Request::is('invoices/warehouse*') ? 'menu-open' : '' }}">
          <a href="#">
            <i class="fa fa-users"></i> <span>Fatora Mastoda</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{ Request::is('invoices/warehouse*') || Request::is('invoices/create') ? 'display:block' : '' }}">
            <li class="{{ Request::is('invoices/create') ? 'active' : '' }}"><a href="{{ url('invoices/create') }}"><i class="fa fa-circle-o"></i> Create Fatora</a></li>
            <li class="{{ Request::is('invoices/warehouse/unfinish') ? 'active' : '' }}"><a href="{{ route('invoices.warehouse', ['action_code'=>'unfinish']) }}"><i class="fa fa-circle-o"></i> Unfinish ( Bagi )</a></li>
            <li class="{{ Request::is('invoices/warehouse/finished_confirm') ? 'active' : '' }}"><a href="{{ route('invoices.warehouse', ['action_code'=>'finished_confirm']) }}"><i class="fa fa-circle-o"></i> Finished ( Kalas )</a></li>
            <li class="{{ Request::is('invoices/warehouse/returned_confirm') ? 'active' : '' }}"><a href="{{ route('invoices.warehouse', ['action_code'=>'returned_confirm']) }}"><i class="fa fa-circle-o"></i> Returned ( Radja )</a></li>
          </ul>
        </li>
      @endif
      @if(Auth::user()->hasRole('Super Administrator'))
        <li class="treeview {{ Request::is('invoices/shop*') ? 'menu-open' : '' }}">
          <a href="#">
            <i class="fa fa-users"></i> <span>Fatora Mahal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{ Request::is('invoices/shop*') ? 'display:block' : '' }}">
            <li class="{{ Request::is('invoices/shop/unfinish') ? 'active' : '' }}"><a href="{{ route('invoices.shop', ['action_code'=>'unfinish']) }}"><i class="fa fa-circle-o"></i> Unfinish ( Bagi )</a></li>
            <li class="{{ Request::is('invoices/shop/finished') ? 'active' : '' }}"><a href="{{ route('invoices.shop', ['action_code'=>'finished']) }}"><i class="fa fa-circle-o"></i> Finished ( Kalas )</a></li>
            <li class="{{ Request::is('invoices/shop/returned') ? 'active' : '' }}"><a href="{{ route('invoices.shop', ['action_code'=>'returned']) }}"><i class="fa fa-circle-o"></i> Returned ( Radja )</a></li>
          </ul>
        </li>
      @endif
      <!--<li class="treeview">
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
      </li>-->
      @if(Auth::user()->hasRole('Super Administrator'))
        <li class="treeview {{ Request::is('users*') ? 'menu-open' : '' }}">
          <a href="#">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{ Request::is('users*') ? 'display:block' : '' }}">
            <li class="{{ Request::is('users') ? 'active' : '' }}"><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i> Users List</a></li>
            <li class="{{ Request::is('users/create') ? 'active' : '' }}"><a href="{{ url('users/create') }}"><i class="fa fa-circle-o"></i> Create User</a></li>
            <li class="{{ Request::is('users/import') ? 'active' : '' }}"><a href="{{ url('users/import') }}"><i class="fa fa-circle-o"></i> Import Users</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::is('actions*') ? 'menu-open' : '' }}">
          <a href="#">
            <i class="fa fa-users"></i> <span>Fatora Actions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{ Request::is('actions*') ? 'display:block' : '' }}">
            <li class="{{ Request::is('actions') ? 'active' : '' }}"><a href="{{ url('actions') }}"><i class="fa fa-circle-o"></i> Action List</a></li>
            <li class="{{ Request::is('actions/create') ? 'active' : '' }}"><a href="{{ url('actions/create') }}"><i class="fa fa-circle-o"></i> Create Action</a></li>
          </ul>
        </li>
      @endif
      @if(Auth::user()->hasRole('Super Administrator') || Auth::user()->hasRole('salesman') || Auth::user()->hasRole('Order Picker'))
        <li class="{{ Request::is('partnumbers') ? 'active' : '' }}"><a href="{{ url('partnumbers') }}"><i class="fa fa-exchange"></i> <span>Parts Number</span></a></li>
      @endif
      @if(Auth::user()->hasRole('Super Administrator'))
        <li class="{{ Request::is('role') ? 'active' : '' }}"><a href="{{ url('role') }}"><i class="fa fa-exchange"></i> <span>Role</span></a></li>
        <li class="{{ Request::is('permission') ? 'active' : '' }}"><a href="{{ url('permission') }}"><i class="fa fa-exchange"></i> <span>Permission</span></a></li>
      @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
