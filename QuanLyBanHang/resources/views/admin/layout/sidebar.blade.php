<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ asset('assets/admin/index3.html') }}" class="brand-link elevation-4">
        <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Urdan</span>
    </a>
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Cao Hải</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- Brands --}}
                <li class="nav-item">
                    <a href="{{ route('admin.brand.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('language.brand') }}
                        </p>
                    </a>

                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- Brands --}}
                <li class="nav-item">
                    <a href="{{ route('admin.slider.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('language.slider') }}
                        </p>
                    </a>

                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- Cate --}}
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('language.cate') }}
                        </p>
                    </a>

                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- Product --}}
                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('language.product') }}
                        </p>
                    </a>

                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- Coupon --}}
                <li class="nav-item">
                    <a href="{{ route('admin.coupon.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('language.coupon') }}
                        </p>
                    </a>

                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- Order --}}
                <li class="nav-item">
                    <a href="{{ route('admin.order.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('language.order') }}
                        </p>
                    </a>

                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- Customer --}}
                <li class="nav-item">
                    <a href="{{ route('admin.customer.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            {{ trans('language.customer') }}
                        </p>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
