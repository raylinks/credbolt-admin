<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#">
                            <img src="{{ asset('global_assets/images/creditwolf.png') }}" width="38"
                                height="38" class="rounded-circle" alt="">
                        </a>
                    </div>

                    <div class="media-body mt-2">
                     
                        </div>
                    </div>
                </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item">
                    <a href="" class="nav-link" id="dashboard">
                        <i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item nav-item-submenu">
                    <a href="" class="nav-link" id="business">
                        <i class="icon-cube3"></i> <span>Users Management</span>
                    </a>

                    <ul class="nav nav-group-sub" data-submenu-title="Businesses">
                        <li class="nav-item">
                              <a href="{{ route('user.index')}}" class="nav-link">View users</a> 
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="" class="nav-link" id="business">
                        <i class="icon-briefcase"></i> <span>Manage Admin Roles</span>
                    </a>

                    <ul class="nav nav-group-sub" data-submenu-title="Businesses">
                        <li class="nav-item">
                              <a href="{{ route('admin.users')}}" class="nav-link">View users</a> 
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="" class="nav-link" id="business">
                        <i class="icon-cash"></i> <span>Loan requests</span>
                    </a>

                    <ul class="nav nav-group-sub" data-submenu-title="Businesses">
                        <li class="nav-item">
                              <a href="{{ route('loan.index')}}" class="nav-link">View loans</a> 
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="" class="nav-link" id="business">
                        <i class="icon-graph"></i> <span>Transactions</span>
                    </a>

                    <ul class="nav nav-group-sub" data-submenu-title="Businesses">
                        <li class="nav-item">
                              <a href="{{ route('transaction.index')}}" class="nav-link">View all</a> 
                        </li>
                    </ul>
                </li>
               
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
</div>
<!-- /main sidebar -->
