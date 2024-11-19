<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ url('/home') }}" aria-expanded="false">
                    <i class="fa fa-dashboard menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-database menu-icon"></i> <span class="nav-text">Master</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('users') }}">User</a></li>
                    <li><a href="{{ url('items') }}">Item</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('sales') }}" aria-expanded="false">
                    <i class="fa fa-shopping-cart menu-icon"></i><span class="nav-text">Penjualan</span>
                </a>
            </li>
            <div class="dropdown-divider"></div>
            @if (auth()->check())
                <li>
                    <a href="{{ url('/logout') }}" aria-expanded="false">
                        <i class="fa fa-power-off menu-icon"></i><span class="nav-text">Sign out</span>
                    </a>
                </li>
            @else
                <li>
                    <a href="#" aria-expanded="false" class="text-muted" style="cursor: not-allowed;">
                        <i class="fa fa-power-off menu-icon text-muted"></i><span class="nav-text text-muted">Sign out</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
