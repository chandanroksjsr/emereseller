@inject('request', 'Illuminate\Http\Request')

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{$data}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> {{ucfirst(Auth::user()->name)}} </p>
          <a href="#"><i class="fa fa-circle text-success"></i>     @if(Auth::user()->role_id == "1")
              ADMINISTRATOR
              @elseif(Auth::user()->role_id == "2")
              USER
              @elseif(Auth::user()->role_id == "4")
              LOGISTICS
              @endif</a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
        <ul class="sidebar-menu">
<li class="header">MAIN NAVIGATION</li>


            <li class="{{ $request->segment(2) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i>

                    <span class="title">DASHBOARD</span>
                </a>
            </li>
              @can('user_management_access')
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-user"></i>
                    <span class="title">MY PROFILE</span>
                </a>
            </li>
@endcan



            @can('user_management_access')
            <li class="{{ $request->segment(1) == 'SACAN LOGS' ? 'active' : '' }}">
                <a href="">
                    <i class="fa fa-qrcode"></i>
                    <span class="title">SCAN LOGS</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan


{{---------------------------------ORDER MANAGEMENT---------------------------------------}}
@can('order_management_access')
<li class="treeview">
    <a href="#">
        <i class="fa fa-shopping-cart"></i>
        <span class="title">ORDER MANAGEMENT</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

    @can('order_access')
    <li class="{{ $request->segment(2) == 'orders' ? 'active active-sub' : '' }}">
            <a href="{{ route('admin.orders.index') }}">
                <i class="fa fa-check-circle-o"></i>
                <span class="title">
                  ORDERS
                </span>
            </a>
        </li>
    @endcan
    </ul>
</li>
@endcan
{{----------------------------------------------------------------------------------------------}}


@can('can_create_card')
<li class="treeview">
    <a href="#">
        <i class="fa fa-credit-card"></i>
        <span class="title">CARD MANAGEMENT</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

    <li class="{{ $request->segment(2) == 'getCard' ? 'active active-sub' : '' }}">
            <a href="{{ route('Card') }}">
                <i class="fa fa-plus"></i>
                <span class="title">
                  CREATE CARD
                </span>
            </a>
        </li>

    <li class="{{ $request->segment(2) == 'MANAGE CARD' ? 'active active-sub' : '' }}">
            <a href="{{ route('Card.manage') }}">
                <i class="fa fa-cog"></i>
                <span class="title">
                  MANAGE CARD
                </span>
            </a>
        </li>



    </ul>
</li>
@endcan

<li class="treeview">
    <a href="#">
        <i class="fa fa-inr"></i>
        <span class="title">BILLING & ACCOUNTS</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

    <li class="{{ $request->segment(1) == 'invoices'? 'active active-sub' : '' }} {{ $request->segment(1) == 'invoice'? 'active active-sub' : '' }}">
            <a href="{{ route('invoice.all') }}">
                <i class="fa fa-files"></i>
                <span class="title">
INVOICES                </span>
            </a>
        </li>



    </ul>
</li>



<li class="{{ $request->segment(1) == 'settings' ? 'active' : '' }}">
    <a href="{{route('settings')}}">
        <i class="fa fa-wrench"></i>

        <span class="title">ACCOUNT SETTINGS</span>
    </a>
</li>
<li class="{{ $request->segment(1) == 'help' ? 'active' : '' }}">
    <a href="{{route('help')}}">
        <i class="fa fa-support"></i>
        <span class="title">HELP & SUPPORT</span>
    </a>
</li>








            <!-- <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">CHANGE PASSWORD</span>
                </a>
            </li> -->

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-sign-out"></i>
                    <span class="title">LOG OUT</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
