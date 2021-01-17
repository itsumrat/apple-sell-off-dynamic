<nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
    <a class="navbar-brand" href="{{ url('dashboard') }}">
        Apple Store
    </a>
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" href="#" id="sidebarToggle">
        <i class="fas fa-bars">
        </i>
    </button>
    <form class="form-inline mr-auto d-none d-md-block">
        <div class="input-group input-group-joined input-group-solid">
            <input aria-label="Search" class="form-control mr-sm-2" placeholder="Search" type="search"/>
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fa fa-search">
                    </i>
                </div>
            </div>
        </div>
    </form>
    <ul class="navbar-nav align-items-center ml-auto">
        {{-- <li class="nav-item dropdown no-caret mr-3 d-none d-md-inline">
            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" id="navbarDropdownDocs" role="button">
                <div class="d-none d-md-inline font-weight-500">
                    Order Tracking
                </div>
            </a>
        </li> --}}
        <li class="nav-item dropdown no-caret mr-3 d-md-none">
            <a aria-expanded="false" aria-haspopup="true" class="btn btn-icon btn-transparent-dark dropdown-toggle" data-toggle="dropdown" href="#" id="searchDropdown" role="button">
                <i class="fa fa-search"></i>
            </a>
            <!-- Dropdown - Search-->
            <div aria-labelledby="searchDropdown" class="dropdown-menu dropdown-menu-right p-3 shadow animated--fade-in-up">
                <form class="form-inline mr-auto w-100">
                    <div class="input-group input-group-joined input-group-solid">
                        <input aria-describedby="basic-addon2" aria-label="Search" class="form-control" placeholder="Search for..." type="text"/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
            <a aria-expanded="false" aria-haspopup="true" class="btn btn-icon btn-transparent-dark dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" id="navbarDropdownAlerts" role="button">
                <i class="fas fa-heart">
                </i>
            </a>
            <div aria-labelledby="navbarDropdownAlerts" class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up">
                <h6 class="dropdown-header dropdown-notifications-header">
                    <i class="mr-2" data-feather="bell">
                    </i>
                    Alerts Center
                </h6>
                <a class="dropdown-item dropdown-notifications-item" href="#!">
                    <div class="dropdown-notifications-item-icon bg-warning">
                        <i data-feather="activity">
                        </i>
                    </div>
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-details">
                            December 29, 2019
                        </div>
                        <div class="dropdown-notifications-item-content-text">
                            This is an alert message. It&apos;s nothing serious, but it requires your attention.
                        </div>
                    </div>
                </a>
                <a class="dropdown-item dropdown-notifications-item" href="#!">
                    <div class="dropdown-notifications-item-icon bg-info">
                        <i data-feather="bar-chart">
                        </i>
                    </div>
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-details">
                            December 22, 2019
                        </div>
                        <div class="dropdown-notifications-item-content-text">
                            A new monthly report is ready. Click here to view!
                        </div>
                    </div>
                </a>
                <a class="dropdown-item dropdown-notifications-item" href="#!">
                    <div class="dropdown-notifications-item-icon bg-danger">
                        <i class="fas fa-exclamation-triangle">
                        </i>
                    </div>
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-details">
                            December 8, 2019
                        </div>
                        <div class="dropdown-notifications-item-content-text">
                            Critical system failure, systems shutting down.
                        </div>
                    </div>
                </a>
                <a class="dropdown-item dropdown-notifications-item" href="#!">
                    <div class="dropdown-notifications-item-icon bg-success">
                        <i data-feather="user-plus">
                        </i>
                    </div>
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-details">
                            December 2, 2019
                        </div>
                        <div class="dropdown-notifications-item-content-text">
                            New user request. Woody has requested access to the organization.
                        </div>
                    </div>
                </a>
                <a class="dropdown-item dropdown-notifications-footer" href="#!">
                    View All Alerts
                </a>
            </div>
        </li>
        <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
            <a aria-expanded="false" aria-haspopup="true" class="btn btn-icon btn-transparent-dark dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" id="navbarDropdownAlertss" role="button">
                <i class="fas fa-cart-plus">
                </i>
            </a>
            <div aria-labelledby="navbarDropdownAlertss" class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up">
                <h6 class="dropdown-header dropdown-notifications-header">
                    <i class="mr-2" data-feather="bell">
                    </i>
                    Alerts Center
                </h6>
                @foreach(App\Model\Backend\Order::where('order_status', 0)->orderBy('created_at', 'DESC')->limit(10)->get() as $value)
                <a class="dropdown-item dropdown-notifications-item" href="orders/{{$value->id}}">
                    <div class="dropdown-notifications-item-icon bg-warning">
                        <i data-feather="activity">
                        </i>
                    </div>
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-details">
                            {{ date('d-m-Y', strtotime($value->created_at)) }}
                        </div>
                        <div class="dropdown-notifications-item-content-text">
                            Invoice: #{{$value->order_no}}, QTY: {{$value->total_count}}, Price: {{$value->price}}
                        </div>
                    </div>
                </a>
                @endforeach
                <a class="dropdown-item dropdown-notifications-footer" href="/orders">
                    View All Order
                </a>
            </div>
        </li>
        <li class="nav-item dropdown no-caret mr-2 dropdown-user">
            <a aria-expanded="false" aria-haspopup="true" class="btn btn-icon btn-transparent-dark dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" id="navbarDropdownUserImage" role="button">
                <img class="img-profile rounded-circle" src="{{ asset('backend/img/admin.png') }}">
                </img>
            </a>
            <div aria-labelledby="navbarDropdownUserImage" class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="img-profile rounded-circle" src="{{ asset('backend/img/admin.png') }}"></img>
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="dropdown-user-details-email">
                            {{ Auth::user()->email }}
                        </div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/admin_profile">
                    <div class="dropdown-item-icon">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/admin_change_password">
                    <div class="dropdown-item-icon">
                        <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                        Change Password
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    <div class="dropdown-item-icon">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </div>
                </a>
                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
