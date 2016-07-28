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
            <li class="active"><a href="{{ url('home') }}" class="{!! Request::url() == url('home') ? 'active' : '' !!}"><i class='fa fa-link'></i> Dashboard</a></li>
            <li><a href="#"><i class='fa fa-link'></i>Sell</a></li>
            <li class="treeview {!! strpos(Request::url(), 'maintenance') == true ? 'active' : '' !!}">
                <a href="#"><i class='fa fa-link'></i><i class="fa fa-angle-left pull-right"></i>Maintenance</a>
                <ul class="treeview-menu">
                    <li class="{!! Request::url() == url('maintenance_brand') ? 'active' : '' !!}"><a href="{!! url('maintenance_brand') !!}">Add Brand</a></li>
                    <li class="{!! Request::url() == url('maintenance_category') ? 'active' : '' !!}"><a href="{!! url('maintenance_category') !!}">Add Category</a></li>
                    <li class="{!! Request::url() == url('maintenance_volume') ? 'active' : '' !!}"><a href="{!! url('maintenance_volume') !!}">Add Volume</a></li>
                    <li class="{!! Request::url() == url('maintenance_nicotine') ? 'active' : '' !!}"><a href="{!! url('maintenance_nicotine') !!}">Add Nicotine Level</a></li>
                    <li class="{!! Request::url() == url('maintenance_product') ? 'active' : '' !!}"><a href="{!! url('maintenance_product') !!}">Add Product</a></li>
                    <li><a href="#">Branch</a></li>
                    <li class="{!! Request::url() == url('maintenance_price') ? 'active' : '' !!}"><a href="{!! url('maintenance_price') !!}">Price</a></li>
                </ul>
            </li>
            <li><a href="#"><i class='fa fa-link'></i>History</a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i><i class="fa fa-angle-left pull-right"></i>Location</a>
                <ul class="treeview-menu">
                    <li><a href="#">Cubao</a></li>
                    <li><a href="#">Sampaloc</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
