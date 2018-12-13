<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <strong class="font-bold">{{ config('app.name', 'Laravel') }}</strong>
                    </a>
                </div>
                <div class="logo-element">
                    PMC
                </div>
            </li>
            <li>
                <a href="{{route('admin.dashboard.index')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
            </li>

            <li>
                <a href="{{route('admin.subscription.index')}}"><i class="fa fa-ticket"></i> <span class="nav-label">Subscriptions</span></a>
            </li>

            <li>
                <a href="{{route('admin.product.index')}}"><i class="fa fa-archive"></i> <span class="nav-label">Products</span></a>
            </li>
        </ul>
    </div>
</nav>