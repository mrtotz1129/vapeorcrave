<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Navigation</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('dashboard') }}" class="{!! Request::url() == url('dashboard') ? 'active' : '' !!}"><i class='glyphicon glyphicon-dashboard'></i> Dashboard</a></li>
            <li class="treeview {!! strpos(Request::url(), 'maintenance') == true ? 'active' : '' !!}">
                <a href="#"><i class='glyphicon glyphicon-cog'></i><i class="fa fa-angle-left pull-right"></i>Maintenance</a>
                <ul class="treeview-menu">
                    <li class="{!! Request::url() == url('maintenance_brand') ? 'active' : '' !!}"><a href="{!! url('maintenance_brand') !!}">Brand</a></li>
                    <li class="{!! Request::url() == url('maintenance_category') ? 'active' : '' !!}"><a href="{!! url('maintenance_category') !!}">Category</a></li>
                    <li class="{!! Request::url() == url('maintenance_volume') ? 'active' : '' !!}"><a href="{!! url('maintenance_volume') !!}">Volume</a></li>
                    <li class="{!! Request::url() == url('maintenance_nicotine') ? 'active' : '' !!}"><a href="{!! url('maintenance_nicotine') !!}">Nicotine Level</a></li>
                    <li class="{!! Request::url() == url('maintenance_product') ? 'active' : '' !!}"><a href="{!! url('maintenance_product') !!}">Product</a></li>
                    <li class="{!! Request::url() == url('maintenance_position') ? 'active' : '' !!}"><a href="{!! url('maintenance_position') !!}">Position</a></li>
                    <li class="{!! Request::url() == url('maintenance_branch') ? 'active' : '' !!}"><a href="{!! url('maintenance_branch') !!}">Branch</a></li>
                    <li class="{!! Request::url() == url('maintenance_users') ? 'active' : '' !!}"><a href="{!! url('maintenance_users') !!}">User</a></li>
                </ul>
            </li>
            <li class="treeview"><a href="#"><i class='glyphicon glyphicon-usd'></i><i class="fa fa-angle-left pull-right"></i>Transaction</a>
                <ul class="treeview-menu">
                    <li class="{!! Request::url() == url('transaction') ? 'active' : '' !!}"><a href="{!! url('transaction') !!}">Inventory</a></li>
                    <li class="{!! Request::url() == url('pointofsales') ? 'active' : '' !!}"><a href="{!! url('pointofsales') !!}">Point of Sales</a></li>
                </ul>
            </li>
            <li class="{!! Request::url() == url('reports') ? 'active' : '' !!}"><a href="{!! url('reports') !!}"><i class='glyphicon glyphicon-list-alt'></i>Reports</a></li>
            <li class="{!! Request::url() == url('queries') ? 'active' : '' !!}"><a href="{!! url('queries') !!}"><i class='glyphicon glyphicon-search'></i>Queries</a></li>
            <li class="{!! Request::url() == url('transaction_history') ? 'active' : '' !!}"><a href="{!! url('transaction_history') !!}"><i class='glyphicon glyphicon-time'></i>History</a></li>
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-map-marker'></i><i class="fa fa-angle-left pull-right"></i>Location</a>
                <ul class="treeview-menu">
                    <li class="{!! Request::url() == url('location_cubao') ? 'active' : '' !!}"><a href="{!! url('location_cubao') !!}">Cubao</a></li>
                    <li class="{!! Request::url() == url('location_sampaloc') ? 'active' : '' !!}"><a href="{!! url('location_sampaloc') !!}">Sampaloc</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
