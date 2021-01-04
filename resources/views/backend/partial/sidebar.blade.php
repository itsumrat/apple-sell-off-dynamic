<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <a class="nav-link collapsed mt-3" href="{{ url('dashboard') }}">
                    <div class="nav-link-icon">
                        <i data-feather="activity">
                        </i>
                    </div>
                    Dashboards
                </a>
                <a aria-controls="collapseAdmin" aria-expanded="false" class="nav-link collapsed" data-target="#collapseAdmin" data-toggle="collapse" href="javascript:void(0);">
                    <div class="nav-link-icon">
                        <i class="fas fa-fw fa-cog"></i>
                    </div>
                    Admin Activities
                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down">
                        </i>
                    </div>
                </a>
                <div class="collapse" data-parent="#accordionSidenav" id="collapseAdmin">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAdminMenu">
                        {{-- @can('role-list')
                        <a class="nav-link" href="{{ route('roles.index') }}">
                            Roles
                        </a>
                        @endcan
                        @can('permission-list')
                        <a class="nav-link" href="{{ route('permissions.index') }}">
                            Permisions
                        </a>
                        @endcan --}}
                        @can('user-list')
                        <a class="nav-link" href="{{ route('users.index') }}">
                            Admin User
                        </a>
                        @endcan
                        {{-- @can('user-list')
                        <a class="nav-link" href="{{ route('vendor') }}">
                            Vendor
                        </a>
                        @endcan --}}
                        @can('user-list')
                        <a class="nav-link" href="{{ route('customer') }}">
                            Customer
                        </a>
                        @endcan
                    </nav>
                </div>
                <a aria-controls="collapseProduct" aria-expanded="false" class="nav-link collapsed" data-target="#collapseProducts" data-toggle="collapse" href="javascript:void(0);">
                    <div class="nav-link-icon">
                        <i class="fas fa-fw fa-cog"></i>
                    </div>
                    Products Setting
                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down">
                        </i>
                    </div>
                </a>
                <div class="collapse" data-parent="#accordionSidenav" id="collapseProducts">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                        @can('category-list')
                        <a class="nav-link" href="{{ route('producttypes.index') }}">Product Type</a>
                        @endcan
                        @can('category-list')
                        <a class="nav-link" href="{{ route('maincategory.index') }}">Category</a>
                        @endcan
                        @can('brand-list')
                        <a class="nav-link" href="{{ route('colors.index') }}">Colors</a>
                        @endcan
                        @can('brand-list')
                        <a class="nav-link" href="{{ route('sizes.index') }}">Sizes</a>
                        @endcan
                        @can('brand-list')
                        <a class="nav-link" href="{{ route('rams.index') }}">Rams</a>
                        @endcan
                        @can('brand-list')
                        <a class="nav-link" href="{{ route('processors.index') }}">Processors</a>
                        @endcan
                        @can('brand-list')
                        <a class="nav-link" href="{{ route('graphicscards.index') }}">Graphics Cards</a>
                        @endcan
                        @can('brand-list')
                        <a class="nav-link" href="{{ route('harddrives.index') }}">Hard Drives</a>
                        @endcan
                    </nav>
                </div>
                <a aria-controls="collapseProduct" aria-expanded="false" class="nav-link collapsed" data-target="#collapseAppleProduct" data-toggle="collapse" href="javascript:void(0);">
                    <div class="nav-link-icon">
                        <i class="fas fa-fw fa-cog"></i>
                    </div>
                    Apple Products
                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down">
                        </i>
                    </div>
                </a>
                <div class="collapse" data-parent="#accordionSidenav" id="collapseAppleProduct">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                        @can('product-list')
                        <a class="nav-link" href="{{ route('products.index') }}">Apple Product List</a>
                        @endcan
                        @can('product-create')
                        <a class="nav-link" href="{{ route('products.create') }}">Add Apple Product</a>
                        @endcan
                    </nav>
                </div>
                <a aria-controls="collapseProduct" aria-expanded="false" class="nav-link collapsed" data-target="#collapseAudioProduct" data-toggle="collapse" href="javascript:void(0);">
                    <div class="nav-link-icon">
                        <i class="fas fa-fw fa-cog"></i>
                    </div>
                    Audio Products
                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down">
                        </i>
                    </div>
                </a>
                <div class="collapse" data-parent="#accordionSidenav" id="collapseAudioProduct">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                        @can('product-list')
                        <a class="nav-link" href="{{ route('products.index') }}">Audio Product List</a>
                        @endcan
                        @can('product-create')
                        <a class="nav-link" href="{{ route('products.create') }}">Add Audio Product</a>
                        @endcan
                    </nav>
                </div>
                <div class="sidenav-menu-heading">
                    Order Activities
                </div>
                <a aria-controls="collapseOrder" aria-expanded="false" class="nav-link collapsed" data-target="#collapseOrder" data-toggle="collapse" href="javascript:void(0);">
                    <div class="nav-link-icon">
                        <i class="fas fa-fw fa-cog"></i>
                    </div>
                    Orders
                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down">
                        </i>
                    </div>
                </a>
                <div class="collapse" data-parent="#accordionSidenav" id="collapseOrder">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                        @can('order-list')
                        <a class="nav-link" href="{{ route('orders.index') }}">Order List</a>
                        @endcan
{{--                        @can('order-list')--}}
{{--                        <a class="nav-link" href="{{ route('invoiceOrderPdf') }}">invoiceOrderPdf</a>--}}
{{--                        @endcan--}}
                    </nav>
                </div>
{{--                <div class="sidenav-menu-heading">--}}
{{--                    Offer Setting--}}
{{--                </div>--}}
{{--                <a aria-controls="collapseLocaiton" aria-expanded="false" class="nav-link collapsed" data-target="#collapseLocaiton" data-toggle="collapse" href="javascript:void(0);">--}}
{{--                    <div class="nav-link-icon">--}}
{{--                        <i class="fas fa-fw fa-cog"></i>--}}
{{--                    </div>--}}
{{--                    Offer Setting--}}
{{--                    <div class="sidenav-collapse-arrow">--}}
{{--                        <i class="fas fa-angle-down">--}}
{{--                        </i>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <div class="collapse" data-parent="#accordionSidenav" id="collapseLocaiton">--}}
{{--                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">--}}
{{--                        @can('category-list')--}}
{{--                        <a class="nav-link" href="{{ route('offerbanner.index') }}">Offer</a>--}}
{{--                        @endcan--}}

{{--                    </nav>--}}
{{--                </div>--}}
                <a aria-controls="collapseLocaiton" aria-expanded="false" class="nav-link collapsed" data-target="#collapseLocaiton" data-toggle="collapse" href="javascript:void(0);">
                    <div class="nav-link-icon">
                        <i class="fas fa-fw fa-cog"></i>
                    </div>
                    Frontend Setting
                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down">
                        </i>
                    </div>
                </a>
                <div class="collapse" data-parent="#accordionSidenav" id="collapseLocaiton">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                        @can('category-list')
                        <a class="nav-link" href="{{ route('slider.index') }}">Slider</a>
                        @endcan
                        @can('category-list')
                        <a class="nav-link" href="{{ route('logo.index') }}">Logo</a>
                        <a class="nav-link" href="{{ url('/faqs_category') }}">Faqs Category Settings</a>
                        <a class="nav-link" href="{{ url('/faqs_setting') }}">Faqs Settings</a>
                        <a class="nav-link" href="{{ url('/home_page_setting') }}">Home Page Settings</a>
                        <a class="nav-link" href="{{ url('/general_setting') }}">General Settings</a>
                        @endcan
                    </nav>
                </div>
            </div>
        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">
                    Logged in as:
                </div>
                <div class="sidenav-footer-title">
                    {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </nav>
</div>
