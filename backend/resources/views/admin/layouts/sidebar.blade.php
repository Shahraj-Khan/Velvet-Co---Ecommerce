<div class="sidebar-wrapper" data-simplebar="true">

<div class="sidebar-header">

    <div class="d-flex align-items-center">
        <img src="{{ asset('assets/images/icons/favicon1.ico') }}"
             class="logo-icon"
             alt="Velvet Co">

        <div class="ms-3">
            <h4 class="logo-text mb-0">
                Velvet Co.
            </h4>

            <span class="logo-subtitle">
                Admin Dashboard
            </span>
        </div>
    </div>
</div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

    <li class="menu-label">
    OVERVIEW
    </li>
    {{-- ==========================
         MAIN
    ========================== --}}
    <li class="{{ request()->routeIs('admin.dashboard') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.dashboard') }}">
            <div class="parent-icon">
                <i class="bx bx-grid-alt"></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>

    {{-- ==========================
         CATALOG
    ========================== --}}
    <li class="menu-label">CATALOG</li>

    <li class="{{ request()->routeIs('admin.products.*') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.products.index') }}">
            <div class="parent-icon">
                <i class="bx bx-package"></i>
            </div>
            <div class="menu-title">Products</div>
        </a>
    </li>

    <li class="{{ request()->routeIs('admin.categories.*') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.categories.index') }}">
            <div class="parent-icon">
                <i class="bx bx-category"></i>
            </div>
            <div class="menu-title">Categories</div>
        </a>
    </li>

    <li class="{{ request()->routeIs('admin.brands.*') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.brands.index') }}">
            <div class="parent-icon">
                <i class="bx bx-purchase-tag"></i>
            </div>
            <div class="menu-title">Brands</div>
        </a>
    </li>

    <li class="{{ request()->routeIs('admin.colors.*') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.colors.index') }}">
            <div class="parent-icon">
                <i class="bx bx-palette"></i>
            </div>
            <div class="menu-title">Colors</div>
        </a>
    </li>

    <li class="{{ request()->routeIs('admin.sizes.*') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.sizes.index') }}">
            <div class="parent-icon">
                <i class="bx bx-ruler"></i>
            </div>
            <div class="menu-title">Sizes</div>
        </a>
    </li>

    {{-- ==========================
         SALES
    ========================== --}}
    <li class="menu-label">SALES</li>

    <li class="{{ request()->routeIs('admin.orders.*') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.orders.index') }}">
            <div class="parent-icon">
                <i class="bx bx-cart-alt"></i>
            </div>
            <div class="menu-title">Orders</div>
        </a>
    </li>

    <li class="{{ request()->routeIs('admin.coupons.*') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.coupons.index') }}">
            <div class="parent-icon">
                <i class="bx bx-discount"></i>
            </div>
            <div class="menu-title">Coupons</div>
        </a>
    </li>

<li class="menu-label">
    CONTENT
</li>

<li>
    <a href="#">
        <div class="parent-icon">
            <i class="bx bx-window-alt"></i>
        </div>

        <div class="menu-title">
            Footer
        </div>
    </a>
</li>

</ul>
    <!--end navigation-->
</div>

